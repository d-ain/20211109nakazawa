<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせフォーム</title>
  <link rel="stylesheet" href="resources/css/reset.css" />
  <script src="https://yubinbango.github.io/yubinbango/yubinbango.js" charset="UTF-8"></script>

<style>
  * {
  box-sizing: border-box;
  }

  .contact {
  width: 960px;
  margin: 0 auto;
  padding: 60px 0;
  }

  .contact-ttl{
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
  .form-name-right{
    width: 35%;
    height: 30pt;
  }

  .form-name-right{
    margin-left: 5%;
  }

  .form-exp,
  .form-exp-right,
  .form-exp-post {
    width: 30%;
    height: 30pt;
    color:rgb(177, 177, 177);
  }

  .form-exp-right{
    margin-left: 31%;
  }

  .red-text{
    color: red;
  }

  .radio-size,
  .radio-size-right{
    width: 30pt;
    height: 30pt;
  }

  .contact-sex + .contact-sex {
    margin-left: 10px;
  }

  .radio-size-right {
    margin-left: 30px;
  }

  .form-m{
    width: 76%;
    height: 30pt;
  }

  .post-text{
    margin-right: 14px;
    margin-left: 13px;
    font-weight: bold;
  }

  .form-exp-post{
    padding-left:  10%;
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

  .error-code {
  margin-bottom: 40px;
  text-align: center;
  color: red;
  }

  .p-postal-code {
    width: 69%;
    height: 30pt;
  }

  .p-region {
    width: 76%;
    height: 30pt;
  }

  </style>

</head>

<body>
  <div class="contact">
    <h1 class="contact-ttl">お問い合わせ</h1>
    @if (count($errors) > 0)
      <p class="error-code">入力に問題があります</p>
    @endif

    <form action="/contact/confirm" method="post" class="h-adr">
      <table class="contact-table">
      @csrf

        <tr>
          <th class="contact-item">お名前<span class="red-text">※</span></th>
          <td class="contact-body">
            <input type="text" name="last-name" class="form-name" value="{{ old('last-name') }}"　/>
            <input type="text" name="first-name" class="form-name-right" value="{{ old('first-name') }}"　/>
          </td>
        </tr>

        <tr>
          <th class="contact-item-exp"></th>
          <td class="contact-body-exp">
            <span class="form-exp">　例）山田</span>
            <span class="form-exp-right">例）太郎</span>
          </td>
        </tr>

      @error('last-name')
      <tr>
        <th>Error</th>
        <td>{{$message}}</td>
      </tr>
      @enderror

      @error('first-name') 
      <tr>
        <th>Error</th>
        <td>{{$message}}</td>
      </tr>
      @enderror
        
        <tr>
          <th class="contact-item">性別<span class="red-text">※</span></th>
          <td class="contact-body">
            <label for="male"><input type="radio" class="radio-size" name="gender"  checked="checked" id="male" value="1"><span class="contact-sex-txt">男性</span></label>
            <label for="female"><input type="radio" class="radio-size-right" name="gender" id="female" value="2"><span class="contact-sex-txt">女性</span></label>
          </td>
        </tr>


        @error('gender')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror



        <tr>
          <th class="contact-item">メールアドレス<span class="red-text">※</span></th>
          <td class="contact-body">
            <input type="text" name="email" class="form-m" value="{{ old('email') }}" />
          </td>
        </tr>
        <tr>
          <th class="contact-item-exp"></th>
          <td class="contact-body-exp">
            <span class="form-exp">　例）test@example.com</span>
          </td>
        </tr>

        @error('email')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror


        <tr>
          <th class="contact-item">郵便番号<span class="red-text">※</span></th>
          <td class="contact-body">
            <span class="p-country-name" style="display:none;">Japan</span>
            <span class="post-text">〒</span>
            <input type="text" name="postcode" id="zipcode" class="p-postal-code" size="8" maxlength="8" value="{{ old('postcode') }}"/>
          </td>
        </tr>
        <tr>
          <th class="contact-item-exp"></th>
          <td class="contact-body-exp">
            <span class="form-exp-post">例）123-4567</span>
          </td>
        </tr>

        @error('postcode')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror


        <tr>
          <th class="contact-item">住所<span class="red-text">※</span></th>
          <td class="contact-body">
            <input type="text" name="address" class="p-region p-locality p-street-address p-extended-address" value="{{ old('address') }}"/>
          </td>
        </tr>
        <tr>
          <th class="contact-item-exp"></th>
          <td class="contact-body-exp">
            <span class="form-exp">　例）東京都渋谷区千駄ヶ谷1-2-3</span>
          </td>
        </tr>

        @error('address')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror


        <tr>
          <th class="contact-item">建物名</th>
          <td class="contact-body">
            <input type="text" name="building_name" class="form-m" value="{{ old('building_name') }}" />
          </td>
        </tr>
        <tr>
          <th class="contact-item-exp"></th>
          <td class="contact-body-exp">
            <span class="form-exp">　例）千駄ヶ谷マンション101</span>
          </td>
        </tr>


        <tr>
          <th class="contact-item-opinion">ご意見<span class="red-text">※</span></th>
          <td class="contact-body">
            <textarea name="opinion" class="form-textarea"  maxlength="120">{{ old('opinion') }}</textarea>
          </td>
        </tr>


        @error('opinion')
        <tr>
          <th>Error</th>
          <td>{{$message}}</td>
        </tr>
        @enderror


      </table>

      <input class="contact-submit" type="submit" value="確認" />

    </form>



  </div>

</body>
</html>