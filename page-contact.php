<?php get_header(); ?>
    <?php

      // 変数の初期化
      $page_flag = 0;
      $clean = array();
	  $error = array();

      // サニタイズ
        if( !empty($_POST) ) {
	      foreach( $_POST as $key => $value ) {
		  $clean[$key] = htmlspecialchars( $value, ENT_QUOTES);
	      }
        }

        if( !empty($clean['btn_confirm']) ) {

	        $error = validation($clean);

	        if( empty($error) ) {
		      $page_flag = 1;
			}


        }elseif( !empty($clean['btn_submit']) ) {


          $page_flag = 2;

          // 変数とタイムゾーンを初期化
          $header = null;
	      $auto_reply_subject = null;
	      $auto_reply_text = null;
          $admin_reply_subject = null;
	      $admin_reply_text = null;
	      date_default_timezone_set('Asia/Tokyo');

          // ヘッダー情報を設定
	      $header = "MIME-Version: 1.0\n";
	      $header .= "From: DAVID-JENNIFER <kazuma06101209@gmail.com>\n";
	      $header .= "Reply-To: DAVID-JENNIFER <kazuma06101209@gmail.com>\n";

	      // 件名を設定
	      $auto_reply_subject = 'お問い合わせありがとうございます。';

	      // 本文を設定
	      $auto_reply_text = "この度は、お問い合わせ頂き誠にありがとうございます。下記の内容でお問い合わせを受け付けました。\n\n";
	      $auto_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	      $auto_reply_text .= "氏名：" . $clean['your_name'] . "\n";
	      $auto_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
          $auto_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";
	      $auto_reply_text .= "DAVID JENNIFER";

	      // メール送信
	      mb_send_mail( $clean['email'], $auto_reply_subject, $auto_reply_text, $header);

          // 運営側へ送るメールの件名
	      $admin_reply_subject = "お問い合わせを受け付けました";
	
	      // 本文を設定
	      $admin_reply_text = "下記の内容でお問い合わせがありました。\n\n";
	      $admin_reply_text .= "お問い合わせ日時：" . date("Y-m-d H:i") . "\n";
	      $admin_reply_text .= "氏名：" . $clean['your_name'] . "\n";
	      $admin_reply_text .= "メールアドレス：" . $clean['email'] . "\n\n";
          $admin_reply_text .= "お問い合わせ内容：" . nl2br($clean['contact']) . "\n\n";

	      // 運営側へメール送信
	      mb_send_mail( 'kazuma06101209@gmail.com', $admin_reply_subject, $admin_reply_text, $header);

        }

		function validation($data) {

			$error = array();
		
			// 氏名のバリデーション
			if( empty($data['your_name']) ) {
				$error[] = "「氏名」は必ず入力してください。";
			} elseif( 20 < mb_strlen($data['your_name']) ) {
				$error[] = "「氏名」は20文字以内で入力してください。";
			}
		  // メールアドレスのバリデーション
			if( empty($data['email']) ) {
				$error[] = "「メールアドレス」は必ず入力してください。";
		
			} elseif( !preg_match( '/^[0-9a-z_.\/?-]+@([0-9a-z-]+\.)+[0-9a-z-]+$/', $data['email']) ) {
				$error[] = "「メールアドレス」は正しい形式で入力してください。";
			}
		  // お問い合わせ内容のバリデーション
			if( empty($data['contact']) ) {
				$error[] = "「お問い合わせ内容」は必ず入力してください。";
			} elseif( !preg_match("/^[ぁ-んァ-ヶ一-龠々]+$/u",$data['contact'])) {
				$error[] = "日本語で入力してください";
			}
		
			return $error;
		  }
    ?>
    <section id="primary" class="content-area">
        <div class="contact-wrapper">

                    <header class="page-header">
                      <?php the_title('<h1 class="entry-title">','</h1>'); ?>
                    </header><!-- .page-header -->

                    <div class="contact-wrapper">

                      <?php if( $page_flag === 1 ): ?>

                      <form method="post" action="">
	                    <div class="element_wrap">
		                  <label>NAME</label>
		                  <p><?php echo $clean['your_name']; ?></p>
	                    </div>
	                    <div class="element_wrap">
		                  <label>MAIL</label>
		                  <p><?php echo $clean['email']; ?></p>
	                    </div>
                        <div class="element_wrap">
		                  <label>TEXT</label>
		                  <p><?php echo nl2br($clean['contact']); ?></p>
	                    </div>
                        <div class="element_wrap_btn">
                          <input type="submit" name="btn_back" value="BACK">
	                      <input type="submit" name="btn_submit" value="SEND">
	                      <input type="hidden" name="your_name" value="<?php echo $clean['your_name']; ?>">
	                      <input type="hidden" name="email" value="<?php echo $clean['email']; ?>">
                          <input type="hidden" name="contact" value="<?php echo $clean['contact']; ?>">
	                    </div>
                      </form>

                      <?php elseif( $page_flag === 2 ): ?>
              
                        <p>送信が完了しました。</p>

						<form method="post" action="">
						  <div class="element_wrap_btn">
						    <input type="submit" name="btn_back_top" value="TOP">
	                      </div>
                        </form>

                      <?php else: ?>

					  <?php if( !empty($error) ): ?>
	                    <ul class="error_list">
	                      <?php foreach( $error as $value ): ?>
		                    <li><?php echo $value; ?></li>
	                      <?php endforeach; ?>
	                    </ul>
                      <?php endif; ?>

                      <form method="post" action="">
	                    <div class="element_wrap">
		                  <label>NAME</label>
		                  <input type="text" name="your_name" value="<?php if( !empty($clean['your_name']) ){ echo $clean['your_name']; } ?>">
	                    </div>
	                    <div class="element_wrap">
		                  <label>MAIL</label>
		                  <input type="text" name="email" value="<?php if( !empty($clean['email']) ){ echo $clean['email']; } ?>">
	                    </div>
                        <div class="element_wrap">
		                  <label>TEXT</label>
		                  <textarea name="contact"><?php if( !empty($clean['contact']) ){ echo $clean['contact']; } ?></textarea>
	                    </div>
                        <div class="element_wrap_btn">
                          <input type="submit" name="btn_confirm" value="CONFIRMATION">
	                    </div>
                      </form>

                      <?php endif; ?>

                    </div><!--contact-wrapper-->

					<div class="btn-wrap">
                      <buttun>
                        <a href="https://ec-daieirecord.com/#area7" class="btn btn-flat btn-bottom"><span>BACK</span></a>
                      </buttun>
                    </div>
                    

        </div><!--contact-container-->
		<div class="footer-contents-page">
          <p>DAVID JENNIFER</p>
        </div>
    </section><!--#primary-->
<?php get_footer();