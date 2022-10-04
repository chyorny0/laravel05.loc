<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <title>Document</title>
</head>
<script>
    function test(event){
        event.preventDefault();
        axios.get("/api/category").then(res=>{
            let categories = res.data
            console.log(categories.data)
        })
    }
</script>
<body>
<form action=""  class="ff">
    <input type="text" onchange="test()">
</form>
</body>
</html>
