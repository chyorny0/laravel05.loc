<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Converter</title>
</head>
<style>
    body{
        width: 100%;
        max-width: 500px;
        margin: 100px auto;
        text-align: center;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    }
    h1{
        text-transform: uppercase;
        letter-spacing: 3px;
    }
    input,select{
        margin-top: 10px;
        width: 200px;
        height: 30px;
        border: 2px solid lightpink;
        outline: none;
    }
    select{
        width: 100px;
        letter-spacing: 2px;
        font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
        font-size: 16px;
    }
</style>
<body>
<h1>Converter</h1>
<form action="">
    <input type="number" value="">
    <select>
        @foreach(array_keys($response->json()["rates"]) as $rate)
            <option value="{{ $rate }}">{{ $rate }}</option>
        @endforeach
    </select>
    <input type="number" value="">
    <select>
        @foreach(array_keys($response->json()["rates"]) as $rate)
            <option value="{{ $rate }}">{{ $rate }}</option>
        @endforeach
    </select>
</form>
<script>
    const input = document.querySelectorAll("input");
    const select = document.querySelectorAll("select");
    const data = {!!  json_encode($response->json()["rates"]) !!};
    input[0].addEventListener("keyup",()=>{
        input[1].value = (input[0].value * data[select[1].value] / data[select[0].value]).toFixed(2);
    })

    input[1].addEventListener("keyup",()=>{
        input[0].value = (input[1].value * data[select[0].value] / data[select[1].value]).toFixed(2);
    })
</script>
</body>
</html>
