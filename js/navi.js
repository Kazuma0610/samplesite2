$(".openbtn").click(function () {//ボタンがクリックされたら
	$(this).toggleClass('active');//ボタン自身に activeクラスを付与し
    $("#g-nav").toggleClass('panelactive');//ナビゲーションにpanelactiveクラスを付与
    $("#wrapper").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
    $("#primary").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
    $(".breadcrumb").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
    $(".live-cat-container").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
    $(".sp_logo").toggleClass('mainblur');//ぼかしたいエリアにmainblurクラスを付与
});

$("#g-nav a").click(function () {//ナビゲーションのリンクがクリックされたら
    $(".openbtn").removeClass('active');//ボタンの activeクラスを除去し
    $("#g-nav").removeClass('panelactive');//ナビゲーションのpanelactiveクラスを除去し
    $("#wrapper").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
    $("#primary").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
    $(".breadcrumb").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
    $(".live-cat-container").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
    $(".sp_logo").removeClass('mainblur');//ぼかしているエリアのmainblurクラスを除去
});