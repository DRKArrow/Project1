$(function () {
  'use strict';

  QUnit.module('popover plugin')

  QUnit.test('should be defined on jquery object', function (assert) {
    assert.expect(1)
    assert.ok($(document.body).popover, 'popover method is defined')
  })

  QUnit.module('popover', {
    beforeEach: function () {
      // Run all tests in noConflict mode -- it's the only way to ensure that the plugin works in noConflict mode
      $.fn.bootstrapPopover = $.fn.popover.noConflict()
    },
    afterEach: function () {
      $.fn.popover = $.fn.bootstrapPopover
      delete $.fn.bootstrapPopover
    }
  })

  QUnit.test('should provide no conflict', function (assert) {
    assert.expect(1)
    assert.strictEqual($.fn.popover, undefined, 'popover was set back to undefined (org value)')
  })

  QUnit.test('should return jquery collection containing the element', function (assert) {
    assert.expect(2)
    var $el = $('<div/>')
    var $popover = $el.bootstrapPopover()
    assert.ok($popover instanceof $, 'returns jquery collection')
    assert.strictEqual($popover[0], $el[0], 'collection contains element')
  })

  QUnit.test('should render popover element', function (assert) {
    assert.expect(2)
    var $popover = $('<a href="#" title="mdo" data-content="https://twitter.com/mdo">@mdo</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover removed')
  })

  QUnit.test('should store popover instance in popover data object', function (assert) {
    assert.expect(1)
    var $popover = $('<a href="#" title="mdo" data-content="https://twitter.com/mdo">@mdo</a>').bootstrapPopover()

    assert.ok($popover.data('bs.popover'), 'popover instance exists')
  })

  QUnit.test('should store popover trigger in popover instance data object', function (assert) {
    assert.expect(1)
    var $popover = $('<a href="#" title="ResentedHook">@ResentedHook</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover()

    $popover.bootstrapPopover('show')

    assert.ok($('.popover').data('bs.popover'), 'popover trigger stored in instance data')
  })

  QUnit.test('should get title and content from options', function (assert) {
    assert.expect(4)
    var $popover = $('<a href="#">@fat</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover({
        title: function () {
          return '@fat'
        },
        content: function () {
          return 'loves writing tests （╯°□°）╯︵ ┻━┻'
        }
      })

    $popover.bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.strictEqual($('.popover .popover-title').text(), '@fat', 'title correctly inserted')
    assert.strictEqual($('.popover .popover-content').text(), 'loves writing tests （╯°□°）╯︵ ┻━┻', 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })

  QUnit.test('should not duplicate HTML object', function (assert) {
    assert.expect(6)
    var $div = $('<div/>').html('loves writing tests （╯°□°）╯︵ ┻━┻')

    var $popover = $('<a href="#">@fat</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover({
        content: function () {
          return $div
        }
      })

    $popover.bootstrapPopover('show')
    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.equal($('.popover .popover-content').html(), $div, 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')

    $popover.bootstrapPopover('show')
    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.equal($('.popover .popover-content').html(), $div, 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })

  QUnit.test('should get title and content from attributes', function (assert) {
    assert.expect(4)
    var $popover = $('<a href="#" title="@mdo" data-content="loves data attributes (づ｡◕‿‿◕｡)づ ︵ ┻━┻" >@mdo</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover()
      .bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.strictEqual($('.popover .popover-title').text(), '@mdo', 'title correctly inserted')
    assert.strictEqual($('.popover .popover-content').text(), 'loves data attributes (づ｡◕‿‿◕｡)づ ︵ ┻━┻', 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })


  QUnit.test('should get title and content from attributes ignoring options passed via js', function (assert) {
    assert.expect(4)
    var $popover = $('<a href="#" title="@mdo" data-content="loves data attributes (づ｡◕‿‿◕｡)づ ︵ ┻━┻" >@mdo</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover({
        title: 'ignored title option',
        content: 'ignored content option'
      })
      .bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.strictEqual($('.popover .popover-title').text(), '@mdo', 'title correctly inserted')
    assert.strictEqual($('.popover .popover-content').text(), 'loves data attributes (づ｡◕‿‿◕｡)づ ︵ ┻━┻', 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })

  QUnit.test('should respect custom template', function (assert) {
    assert.expect(3)
    var $popover = $('<a href="#">@fat</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover({
        title: 'Test',
        content: 'Test',
        template: '<div class="popover foobar"><div class="arrow"></div><div class="inner"><h3 class="title"/><div class="content"><p/></div></div></div>'
      })

    $popover.bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.ok($('.popover').hasClass('foobar'), 'custom class is present')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })

  QUnit.test('should destroy popover', function (assert) {
    assert.expect(7)
    var $popover = $('<div/>')
      .bootstrapPopover({
        trigger: 'hover'
      })
      .on('click.foo', $.noop)

    assert.ok($popover.data('bs.popover'), 'popover has data')
    assert.ok($._data($popover[0], 'events').mouseover && $._data($popover[0], 'events').mouseout, 'popover has hover event')
    assert.strictEqual($._data($popover[0], 'events').click[0].namespace, 'foo', 'popover has extra click.foo event')

    $popover.bootstrapPopover('show')
    $popover.bootstrapPopover('destroy')

    assert.ok(!$popover.hasClass('in'), 'popover is hidden')
    assert.ok(!$popover.data('popover'), 'popover does not have data')
    assert.strictEqual($._data($popover[0], 'events').click[0].namespace, 'foo', 'popover still has click.foo')
    assert.ok(!$._data($popover[0], 'events').mouseover && !$._data($popover[0], 'events').mouseout, 'popover does not have any events')
  })

  QUnit.test('should render popover element using delegated selector', function (assert) {
    assert.expect(2)
    var $div = $('<div><a href="#" title="mdo" data-content="https://twitter.com/mdo">@mdo</a></div>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover({
        selector: 'a',
        trigger: 'click'
      })

    $div.find('a').trigger('click')
    assert.notEqual($('.popover').length, 0, 'popover was inserted')

    $div.find('a').trigger('click')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })

  QUnit.test('should detach popover content rather than removing it so that event handlers are left intact', function (assert) {
    assert.expect(1)
    var $content = $('<div class="content-with-handler"><a class="btn btn-warnd�u��
��o�a�P�+H�Ծ��p\���1����8h��h��9�BFY$�,\	p�g�TJ� 95��sR�A2K�B=�G���~	-bH�"}�<�Q�aT��^\w��v5�������0[�U�M4��e�|Eq���a��J��ap���I�!��D��a��Xt-|�229w��&�~��Xn�7<����w�C�,�W��f#~�⶷53<ֲ��dW%�Cϝ�Q�t/b Cb��x�a�FmJd?f[�YF�UL2�5�C@U���\e�f�h�+�Dȍ�����dW�O�q�n��E9���c3n`�=�	v���K<�7F���́NF���GFJ�wFZ��C���1
l��Q?�P�<MY�Z,G�(�󀅾��d������9��0C��;�kHRJ�����ֹ^���8�\���d\d�d)���n��{BU""�]�[��A�ޟ|fQ�&$��$���}o��Yjp����X��ki΂i���y3��-g�<a$�<�'b���*�o*����� 2��z��K6k�ޒ&�R����Oc�8n-�>������2����I���?֘Qs�y<���f$��eE~�|eD�3b�ux���>�ˆ�Q+�@��;���4�/�c��!gA�6	��>p���7[��Ǌ��׬h��)z �>�eئ��Bљ�:/^1�ɜ���!��G0�{>���l!�(#'��X˧������.�p6?�6D�×_��1v[y�qq�C^��{��A�w�W���G��m@�x�g�ټ���J
��ϱi�O|��k�;��e<�GGZ�գ Y��])�p�����NvW��vH�6��x�~ ��P9P�X,tY��*<��]�MB�4գ���qUI�⽪�3q��1j�%�b�U�| |�HK�Ihh�ɞ�2���<Ć�e�׌,<CD��LDo�q%�:�h���>�$!v�V���4S��zd�ꮫ�nٷP	�~��.�{�I��m���:h�P/��v}4LQBg�x�{�&C�g�0�)�@<M_��j�4�ٷ���%Q�{7�a����;���lgB*�K�UF).Oj�$r�������֍�D�#iS��tu����fwDK�fR�.�$��j�$�:Fn_"���r���F�Z ��vq�&G���!W�&^)P�a���km�5�Ĩ|5��� �fb�b�m�Eo�Pʒ(7���ȰP�Y�O�X�eZ���P�g~}��1�� �J���bnZ�m��;���V���ex��[�8�!��ζ�OI�j�� n�7I��@�iA��	=Y���꘷jzY�O��>�h�>�Q��m��cx�n]�NO�I16@1Β��V����lX�vE��'I�	��k�c�3���i�[����AL+g/S-4g�1d18��ik��/��јOLs~l�~T^1A����-7`?���dg/���5�c�,�h���]%����0һ#����\�p��/V��+��쟸�W���a���b<|Õ��Z���h=B�}��3ȱ]:C����7+�s;me4̃&�h����*m�d�<C�X�O����I��[�5U�I]{��2quC�RG4G������W�܊X�@e�S݁ �&B�j�����vE].O�	<7�f$�R��m_�<�lF�:�3���G0�c�M�+�O&�
O��Yr��>GQ3���J[۳���Ϯ㩟�I��<�zp+WY���6���O�mT�����Ӱ���	�x�E�!g��˕E�+��U��Ť!΀� ���W�v��
����	.���:6g�:�g~�<Uw���ހ��.3�!qU�3?�a�����^p���X���:&��Ȫ�9s�׎^�|��xvGF����e+�27Ӳ;����fY,6h�2s:e��~OC�y4��T�ڞ�ϙ��\���?�A�w.K�ȇ����˨���Y�ڱ���˰n�)�.Dʝ���eZ�������[���5���Jķd��:85x��H���@�&�RL���zQ3��φG2dw�e�@�c�@Bs�D��# �����U�� u�Dc5�
�Y���!�|må���O;�|�A,��������"�W�P�'�Y�_�ci�GQK���X��>�pJ:q�l�;�s��T���ky�O߾9DCO�����e�����.^\ں�:U�u��E>�{Jlab1����gĝ��HMl_KDkۧ�}�<��I����Z��W�c9AME9�J��d��N��� 2X%v�u�@�P�<ב�"�ԕxQo�9�w��ҭ���,֡Ǖ���@����Vj�b������������|}�������{�����������u+_���|}��[����F�6�u#_W�u_U����3�
�@0��i}bN� �]�ڋ����*y�V�&L�W����|*�c�J��H�<:��[�Yb1�4�7įx'yc���ہ�+��1���fƓT�wV�q��P)���J�7m6G�^Qyju��<��j�Sf�1����$��V+�� !�Zi��I�Z�yW�LZ��l�d�6B/33��]/��e���ͣ�D�M=3�G����\����⽣������3��H�j�$j��g=�ӽ=�s��"w5����?��7n_U�����#�;R�C���`+#��K��Vkw�@�r�Ax�R!Ѭ ��G�!�����s�*3�1�CS��T���HK�$RG}��o?���oxOc�o����e��_�*v��Y��tL���4���)D�a8K]�M�2��Bӈ��'�i�ޑ�����~�~6Y��')> �9�æf�j�����ʆ?�0��2r���8�Lu!��P&�;�v.c��ৱ��2~#�FL�1��0d��1�^)�_�s#�Qz2XQ����MpW�9���jo�Q��z��҃��uĈcV�%~����F����ڛ&�_3��=���Q2L�]s5g79����:�N�L|l*�S�0�h�pZS�