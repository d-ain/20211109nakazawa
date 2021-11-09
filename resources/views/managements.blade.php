<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせ管理システム</title>
  <link rel="stylesheet" href="resourcescss/reset.css" />

  <body>

  @if (isset($items))
      {{$items}}
  @endif


            <label for="all"><input type="radio" class="radio-size-right" name="gender" id="all" /><span class="contact-sex-txt">全て</span></label>

</body>
</html>