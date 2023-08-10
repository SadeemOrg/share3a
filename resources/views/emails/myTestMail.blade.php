<!DOCTYPE html>
<html>
<head>
    <title>sajilne.com</title>
</head>
<body  class="center">
    <h1>تهانينا {{ $details['name'] }}</h1>
    <h1>{{ $details['title'] }}</h1>
المستخدم  <p>{{ $details['email'] }}</p>
  كلمة السر  <p>{{ $details['password'] }}</p>
  <a href="https://sajilne.com/Admin">  لدخول الى المنضومة
  </a>


  <title>sajilne.com</title>
</body>
</html>
<style>
    .center {
        text-align: center;
      margin: auto;
      width: 60%;
      border: 3px solid #73AD21;
      padding: 10px;
    }
    </style>
