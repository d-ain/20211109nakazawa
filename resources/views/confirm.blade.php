<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>確認画面</title>
  <link rel="stylesheet" href="resources/css/reset.css" />

  <style>
    * {
      box-sizing: border-box;
    }


    .contact {
      width: 960px;
      margin: 0 auto;
      padding: 60px 0;
    }

    .contact-ttl {
      font-size: 30px;
      margin-bottom: 40px;
      text-align: center;
    }

    .contact-table {
      width: 100%;
      margin-bottom: 20px;
    }

    .contact-item,
    .contact-body {
      padding-top: 30px;
    }

    .contact-item,
    .contact-item-exp {
      width: 30%;
    }

    .contact-body,
    .contact-body-exp {
      width: 70%;
    }

    .form-name,
    .form-name-right {
      width: 35%;
      height: 30pt;
    }

    .form-name-right {
      margin-left: 5%;
    }

    .form-exp,
    .form-exp-right,
    .form-exp-post {
      width: 30%;
      height: 30pt;
      color: rgb(177, 177, 177);
    }

    .form-exp-right {
      margin-left: 31%;
    }

    .red-text {
      color: red;
    }

    .radio-size,
    .radio-size-right {
      width: 30pt;
      height: 30pt;
    }

    .contact-sex+.contact-sex {
      margin-left: 10px;
    }

    .radio-size-right {
      margin-left: 30px;
    }

    .form-m {
      width: 76%;
      height: 30pt;
    }

    .post-text {
      margin-right: 14px;
      margin-left: 13px;
      font-weight: bold;
    }

    .form-post {
      width: 69%;
      height: 30pt;
    }

    .form-exp-post {
      padding-left: 10%;
    }

    .form-textarea {
      width: 76%;
      height: 200px;
    }

    .contact-submit {
      width: 200px;
      background-color: black;
      color: #fff;
      display: block;
      margin: 0 auto;
      font-size: 20px;
      padding: 15px;
      border-radius: 5px;
      cursor: pointer;
      margin-top: 50px;
    }

    .contact-re {
      font-size: 17px;
      display: block;
      text-align: center;
      margin-top: 10px;
    }


  </style>

</head>

<body>
  <div class="contact">
    <h1 class="contact-ttl">内容確認</h1>
    <form action="/contact/complete" method='post'>
      @csrf
      <table class="contact-table">
        <tr>
          <th class="contact-item">お名前</th>
          <td class="contact-body">
            <input type="hidden" name="fullname" class="form-m" value='<? print($input["last-name"].$input["first-name"]); ?>'>	</input>
               <p>{{ $input["last-name"] }}　{{ $input["first-name"] }}</p>

          </tr>
        <tr>
          <th class="contact-item">性別</th>
          <td class="contact-body">
              <input type="hidden" name="gender" value='{{ $input["gender"] }}'>	</input>
              <p><? if($input["gender"] == 1){ print('男性'); }else{ print('女性'); } ?></p>
          </td>
        </tr>
        <tr>
          <th class="contact-item">メールアドレス</th>
          <td class="contact-body">
            <input type="hidden" name="email" class="form-m" value='{{ $input["email"] }}'>	</input>
            <p>{{ $input["email"] }}</p>
          </td>
        </tr>
        <tr>
          <th class="contact-item">郵便番号</th>
          <td class="contact-body">
            <input type="hidden" name="postcode" class="form-post" value='{{ $input["postcode"] }}'>	</input>
              <p>{{ $input["postcode"] }}</p>
          </td>
        </tr>
        <tr>
          <th class="contact-item">住所</th>
          <td class="contact-body">
            <input type="hidden" name="address" class="form-m" value='{{ $input["address"] }}'>	</input>
              <p>{{ $input["address"] }}</p>
          </td>
        </tr>
        <tr>
          <th class="contact-item">建物名</th>
          <td class="contact-body">
            <input type="hidden" name="building_name" class="form-m" value='{{ $input["building_name"] }}'>	</input>
              <p>{{ $input["building_name"] }}</p>
          </td>
        </tr>
        <tr>
          <th class="contact-item-opinion">ご意見</th>
          <td class="contact-body">
            <input type="hidden" name="opinion" class="form-textarea" value='{{ $input["opinion"] }}'>	</input>
              <p>{{ $input["opinion"] }}</p>
          </td>
        </tr>
      </table>
      <input class="contact-submit" type="submit" value="送信" />
      <a href="/contact" class="contact-re">修正する</a>
    </form>
  </div>
</body>