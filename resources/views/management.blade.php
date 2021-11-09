<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>お問い合わせ管理システム</title>
  <link rel="stylesheet" href="resources/css/reset.css" />


<style>


    .contact {
      width: 1200px;
      margin: 0 auto;
      padding: 30px 0;
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

    .radio-size-right {
      width: 30pt;
      height: 30pt;
      margin-left: 40px;
    }

    .search-m {
      width: 220pt;
      height: 30pt;
    }

    .search-md {
      width: 222pt;
      height: 30pt;
    }

    .search-ttl {
      padding-right: 50px;
      text-align: left;
    }

    .search-ttl-m {
      padding-left: 40px;
      text-align: left;
    }

    .contact-submit {
      width: 170px;
      background-color: black;
      color: #fff;
      display: block;
      margin: 0 auto;
      font-size: 18px;
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


    svg.w-5.h-5 {
      width: 30px;
      height: 30px;
    }

    .table-out {
    border: 1px solid;
    width: 95%;
    padding: 30px;
    }


    .bottom-line {
    border-bottom: 1px solid black;
    }

    table tbody tr td.inquiry-opinion p{
    width: 25ch;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    }

    tbody tr td.inquiry-opinion p:hover{
    width:auto;
    }

    
    .delete-submit {
      width: 60px;
      background-color: black;
      color: #fff;
      font-size: 13px;
      border-radius: 5px;
      cursor: pointer;
    }


    .list {
      width: 1200px;
      margin: 0 auto;
      padding: 30px 0;
    }

    .lefttext {
      text-align: center;
    }


  </style>
</head>

<body>
  <div class="contact">
  <h1 class="contact-ttl">管理システム</h1>
  <form action="/contact/management" method="post" class="table-out">
    @csrf
    <table>
      <tr class="line">
        <th class="search-ttl">お名前</th>
        <td><input type="text"  name="fullname" class="search-m" /></td>
        <th class="search-ttl-m">性別</th>
        <td>

          <label for="all"><input type="radio" class="radio-size-right" name="gender" id="all"  value="0" checked="checked" /><span class="contact-sex-txt">全て</span></label>
          <label for="female"><input type="radio" class="radio-size-right" name="gender" id="male" value="1" /><span class="contact-sex-txt">男性</span></label>
          <label for="female"><input type="radio" class="radio-size-right" name="gender" id="female" value="2" /><span class="contact-sex-txt">女性</span></label>
        </td>
      </tr>
      <tr class="line">
        <th class="search-ttl">登録日</th>
        <td><input type="date" class="search-md" name="fromdate"　value="fromdate" /></td>
        <td><span>　〜　</span></td>
        <td><input type="date" class="search-md" name="enddate"　value="enddate" /></td>
      </tr>
      <tr class="line">
        <th class="search-ttl">メールアドレス</th>
        <td><input type="text"  name="email" class="search-m" /></td>
      </tr>


  </table>
        <input class="contact-submit" type="submit" value="検索" />
        <a href="/contact/management" class="contact-re">リセット</a>


  </form>
    {{ $items->appends(request()->input())->links() }}
<table class="list">
  <tr>
    <th>ID</th>
    <th>お名前</th>
    <th>メールアドレス</th>
    <th>ご意見</th>
  </tr>

  @foreach ($items as $item)
  <tr class="lefttext">
    <td>
      {{$item->id}}
    </td>
    <td>
      {{$item->fullname}}
    </td>
    <td>
      {{$item->email}}
    </td>
    <td class="inquiry-opinion">
      <p>
      {{$item->opinion}}
      </p>
    </td>
    <td>
      <form action="{{url('/contact/management/delete',$item->id)}}" method="post">
      @csrf
      <button type="submit" class="delete-submit">削除</button>
      </form>
    </td>
  </tr>
  @endforeach
</table>


</div>
</body>
</html>