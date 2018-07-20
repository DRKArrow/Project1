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
          return 'loves writing tests ï¼ˆâ•¯Â°â–¡Â°ï¼‰â•¯ï¸µ â”»â”â”»'
        }
      })

    $popover.bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.strictEqual($('.popover .popover-title').text(), '@fat', 'title correctly inserted')
    assert.strictEqual($('.popover .popover-content').text(), 'loves writing tests ï¼ˆâ•¯Â°â–¡Â°ï¼‰â•¯ï¸µ â”»â”â”»', 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })

  QUnit.test('should not duplicate HTML object', function (assert) {
    assert.expect(6)
    var $div = $('<div/>').html('loves writing tests ï¼ˆâ•¯Â°â–¡Â°ï¼‰â•¯ï¸µ â”»â”â”»')

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
    var $popover = $('<a href="#" title="@mdo" data-content="loves data attributes (ã¥ï½¡â—•â€¿â€¿â—•ï½¡)ã¥ ï¸µ â”»â”â”»" >@mdo</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover()
      .bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.strictEqual($('.popover .popover-title').text(), '@mdo', 'title correctly inserted')
    assert.strictEqual($('.popover .popover-content').text(), 'loves data attributes (ã¥ï½¡â—•â€¿â€¿â—•ï½¡)ã¥ ï¸µ â”»â”â”»', 'content correctly inserted')

    $popover.bootstrapPopover('hide')
    assert.strictEqual($('.popover').length, 0, 'popover was removed')
  })


  QUnit.test('should get title and content from attributes ignoring options passed via js', function (assert) {
    assert.expect(4)
    var $popover = $('<a href="#" title="@mdo" data-content="loves data attributes (ã¥ï½¡â—•â€¿â€¿â—•ï½¡)ã¥ ï¸µ â”»â”â”»" >@mdo</a>')
      .appendTo('#qunit-fixture')
      .bootstrapPopover({
        title: 'ignored title option',
        content: 'ignored content option'
      })
      .bootstrapPopover('show')

    assert.notEqual($('.popover').length, 0, 'popover was inserted')
    assert.strictEqual($('.popover .popover-title').text(), '@mdo', 'title correctly inserted')
    assert.strictEqual($('.popover .popover-content').text(), 'loves data attributes (ã¥ï½¡â—•â€¿â€¿â—•ï½¡)ã¥ ï¸µ â”»â”â”»', 'content correctly inserted')

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
    var $content = $('<div class="content-with-handler"><a class="btn btn-warndËu²€
ÜÀoÕa·Pâ+HœÔ¾‹Öp\Ÿ©1²ä¼8húŠhâ²Ú9—BFY$œ,\	p‘g‘TJÍ 95…ñsR‰A2K´B=šG˜€Ø~	-bHŞ"}ÿ<úQÜaT‚ï^\wƒâv5şš¬ÑêÌ0[UÚM4ıóe†|Eq·›¥a‰ÙJÀÎap¥•IË!ì–DÁ†a«âXt-|Í229w–&ç~€”XnŸ7<÷ƒü½wóC³,ÊWË£f#~ìâ¶·53<Ö²šdW%¤CÏµQ—t/b Cb´x¿aöFmJd?f[ÁYFÒUL2Ç5ÖC@UâáÎ\eáfğh¸+üDÈ±ºÓÁdWğO¬q˜n—¤E9±÷c3n`å=Ã	vğ¼ğ“K<¦7FÂñ®ê½ÍNF©˜ØGFJ…wFZòÏC‹…Š1
l³“Q?°Pë<MYˆZ,Gƒ(Ôó€…¾…«dôô‘ˆÉİ9’µ0CŞı;èkHRJ½§‚‡£Ö¹^ˆ€‡8Û\—æ•Éd\d„d)«ªÿnç¶õ{BU""«]ê¿[’ÃA®ŞŸ|fQ&$«Å$ı°}o­öYjp¨ßòáXé·ÀkiÎ‚i”òÎy3ƒš-gŞ<a$ä<›'bóÊÓ*á“o*í£ôŞÆä 2´ázùüK6káŞ’&òºR¯ÇÁ“Ocû8n-Ó>ª¿²†·À2‘„ıIş–¤?Ö˜Qsy<ü°ùf$‘¦eE~Â|eDÑ3b·ux€éë>ƒË†ÖQ+¿@÷Š;ı‹©4×/ìc±Â•“!gAÍ6	ÚÏ>pÌñ7[ìÇŠ·ê×¬h—õ)z Ä>üeØ¦ïÇBÑ™’:/^1ÅÉœˆØ÷!ÚâG0½{>±ƒ†l!(#'ÀÕXË§éó¥äáÉ¿.ùp6?â‰6Dã«Ã—_ŸŠ1v[yÆqqC^¶â{ÂëA±wí¶WÙÈûGÿm@ÌxŸgÃÙ¼ÃÚJ
à¸ÊÏ±iÀO|†«k‹;Çæe<ïGGZíÕ£ Y¬É])£p†âÚßÉNvWœÈvH6¬Šx~ âÙP9PX,tYª„*<‰ğ]¶MBò4Õ£üÈê¡qUIñâ½ªû3q”›1j…%ŞbÑUı| |ÄHKÊIhhğÉå2—ÎÕ<Ä†òeÚ×Œ,<CD½LDoøq%º:¶hÀ’–>ó$!vÖVÕèü4Sèò€zdÇê®«ánÙ·P	Í~¨ˆ.â{òIŒÆm–ºè:hÖP/¾Öv}4LQBg‹xÿ{¦&C¦gÎ0”)·@<M_ö¹jò4Ù·‰ù%Q{7¤a§³®;¥”lgB*KêUF).Ojı$r¦ºÄÒúåÑÖ×Dö#iSóåtu´ü‘¦fwDK¬fRÕ.¿$‹Èj‘$á›:Fn_"áœrôœÑFÄZ ±ò†vqü&G…ß!WÂ&^)PÙaÜÍîkm²5ÅÄ¨|5Ÿ‹± ‚fbœbáŠm©Eo·PÊ’(7£ØäÈ°P¯Y¨O™XÕeZ¨ÿ¶P¿g~}ˆ¼1î»î ÖJõ´¦bnZ¾mØà;¬¬VÖï°ex˜…[À8í!³³Î¶ÀOIğjòö n7IğÂ@ØiAœâ	=YéÕÉê˜·jzY¾O’À>½h…>æQ™ŠmàªŞcxÆn]¼NO‚I16@1Î’ÌüVú–ğélXÂ…ÒvE‚¥'I	›ĞkàcÇ3æÙÁi[Ë­ÌäAL+g/S-4gš1d18£¿ikàà/ùÜÑ˜OLs~lÆ~T^1Aû‘ÿå-7`?öÏØdg/³ü¢5–c‘,ëhã€’]%¨£Ûğ0Ò»#·î ÿå\åpÂá/Vöâ+Ÿ«ìŸ¸²W”Á•a¿±µb<|Ã•®§Z™†»h=B´}ûİ3È±]:Cú¾ü„7+£s;me4Ìƒ&óh§ÈıÉ*måd<C…XÑO±Á±ĞIÈÌ[ÿ5UˆI]{°î2quCªRG4G©¬ÈÀ•íWÔÜŠXÆ@eÇSİ ú&B³jˆŸ¬ÄÑvE].OÉ	<7f$ÈRàğm_Ğ<lF—:•3–ú­G0ºc‹MÏ+÷O&³
O¯‹Yr“¤>GQ3‚°ŸJ[Û³”ª¡Ï®ã©ŸèIÕÛ<œzp+WY6ãÒ´OÒmT“çÒÊªÓ°Áøá	ªx™E§!gæ‚ÄË•Eˆ+ÇàU‡œÅ¤!Î€„ ’ò–ïWğv‘ô
†öÏğ	.½¾Ë:6gæ:¥g~<UwÊ†¶Ş€½ê.3×!qUä3?úaÕ¥¿õ»^p¬ñ¼¡…X¶Æó–:&àûÈªª9sŒ×^ğ|òà©xvGF‘õ˜e+¸27Ó²;ÀØßöfY,6h¿2s:eÔÀ~OCåªy4í®è‹TˆÚ€Ï™‰\²¹¢?ÀA°w.K½È‡‰ÅåÀË¨ñÀªY´Ú±÷ååË°n£)†.DÊÁ€°eZöŒÛ›Á«–[İÜ´5’ÚÒJÄ·dÀà:85xìÊH„• @¼&ÈRL¼­ÀzQ3ƒ¢Ï†G2dw•eÖ@»c°@BsˆDûÏ# Èğ‰©²U‘Î u¬Dc5„
ŠYöğÉ!·|mÃ¥‹’›O;®|¹A,–€‹õãæëˆ"‰WúPÍ'±Y_¨ci¦GQKŸ¥X¶>ŒpJ:q lè;©s‘ùT±¸›kyæOß¾9DCOŸš¹œ¦eúÄßñ©¢ã.^\Úº†:Uáu¨ãE>{Jlab1éÀ›gÄüôHMl_KDkÛ§âº}İ<¹ËIãÙš—ZıÛWÏc9AME9êJÉÈd†¼N§Üâ 2X%vüuî@õPÏ<×‘"àÔ•xQoÂ9Ãw‰Ò­³«È,Ö¡Ç•ø©ì@ÃÄ•ÜVj‰b æ”ÕğÀ§„øº¯­|}‰¯ûøº—¯{øº›¯»øº“¯Ïğu+_Ÿæë“|}‚¯[øÚÄ×F¾6ğu#_Wñu_U¾®…´3™
Î@0’°i}bNå Ì]ÚÚ‹³¢ë*yäV¬&L¼W¼ƒûÜ|*»cÃJøÕH¨<:¼È[õYb1ù4ñ7Ä¯x'yc˜ÇÛ¯+âş1²úáfÆ“T¦wVè‰q”ÿP)ùÚôŠJÀ7m6Gà^Qyju‰´<Æj‰Sfñ1Ùçâõ$†V+ş“ !¼ZiæğI»ZÏyWãLZÍ³lİdŞ6B/33à]/´¸e´ÌÌÍ£ñDÙM=3Gîù½ù\º–÷Œâ½£ª•ü¾£°3ôÌHªjş$jè‚ñg=„Ó½=Ñsš³"w5şŠù¸?Åö7n_UÌêÊøÍ#”;RßC¶ü¿`+#àˆK ŠVkwƒ@ÿrŒAxßR!Ñ¬ èó‹G!À¥øÅÄs­*3¡1CSéÚTÌâHKŸ$RG}®ıo?¬ÃÛoxOc˜o±¸‹eµ÷_Ú*v¬YÑtLŸÌâ˜4 ±Ä)D­a8K]ïMÄ2†ÛBÓˆîÆ'âiÊŞ‘¹ÚÇé—~õ~6Y‘Æ')> Ğ9¯Ã¦fÄjº–…„İÊ†?ÿ0¸®2rÚ±Ó8…Lu!±µP&Ş;Ôv.cÖòà§±‘œ2~#îFLû1Ìæ0dÄ1À^)µ_¡s#¼Qz2XQ—£¹ÉMpWÔ9µ«¤joóœQ³Œz§çÒƒ×çuÄˆcVè%~ü‰§äF±ÑÿŠÚ›&Ä_3–¸=ÇøçQ2L£]s5g79ªæÜòº:áNíL|l*é¸SÍ0æh¡pZS