$('#wrapper').multiscroll({
  sectionsColor: ['#EFEFEF', '#EFEFEF', '#DCD6D2','#EFEFEF', '#DCD6D2','#DCD6D2', '#EFEFEF'],//セクションごとの背景色設定
  anchors: ['area1', 'area2', 'area3','area4','area5','area6','area7'],//セクションとリンクするページ内アンカーになる名前
  menu: '#navi-menu',//上部ナビゲーションのメニュー設定
  navigation: true,//右のナビゲーション出現、非表示は false
  navigationTooltips:['TOP', 'LIVE', 'NEWS','SNS','MOVIE','FAN-CLUB','CONTACT'],//右のナビゲーション現在地時に入るテキスト
  loopTop: true,//最初のセクションを上にスクロールして最後のセクションまでスクロールするかどうかを定義します。
  loopBottom: true,//最後のセクションを下にスクロールして最初のセクションまでスクロールするかどうかを定義します。
  normalScrollElements: '.content-area',
});