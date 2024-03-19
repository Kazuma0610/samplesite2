//同じ日付で2回目以降ならローディング画面非表示の設定

var splash_text = $.cookie('accessdate'); //キーが入っていれば年月日を取得
var myD = new Date();//日付データを取得
var myYear = String(myD.getFullYear());//年
var myMonth = String(myD.getMonth() + 1);//月
var myDate = String(myD.getDate());//日
    
if (splash_text != myYear + myMonth + myDate) {//cookieデータとアクセスした日付を比較↓
        $("#splash").css("display", "block");//１回目はローディングを表示
        setTimeout(function () {
            $("#splash_logo").fadeIn(1500, function () {//1000ミリ秒（1秒）かけてロゴがフェードイン
                setTimeout(function () {
            $("#splash_logo").delay(2000).fadeOut('2000');//ロゴを1.2秒待機してからフェードアウト
                }, 1000);//1000ミリ秒（1秒）後に処理を実行
        setTimeout(function () {
            $("#splash").delay(1500).fadeOut('2000', function () {//ローディング画面を1.5秒待機してからフェードアウト
            $('body').addClass('appear');//フェードアウト後bodyにappearクラス付与
            var myD = new Date();
            var myYear = String(myD.getFullYear());
            var myMonth = String(myD.getMonth() + 1);
            var myDate = String(myD.getDate());
            $.cookie('accessdate', myYear + myMonth + myDate); //accessdateキーで年月日を記録
        });
        }, 1700);//1700ミリ秒（1.7秒）後に処理を実行
    });
}, 1000);//1000ミリ秒（1秒）後に処理を実行
}else {
    $("#splash").css("display", "none");//同日2回目のアクセスでローディング画面非表示
    $("#header").css("opacity", "1");//同日2回目のアクセスでローディング画面表示
    $("#container").css("opacity", "1");//同日2回目のアクセスでローディング画面表示
    $("#footer").css("opacity", "1");//同日2回目のアクセスでローディング画面表示
}  