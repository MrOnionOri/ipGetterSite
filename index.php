<html>
<head>
<script type="text/javascript" src="jquery-3.4.1.min.js"></script>
</head>
<body>
<script>

function json(url) {
  return fetch(url).then(res => res.json());
}

$(document).ready(function(){
    let apiKey = 'adec259017840e2586876dc965f4b9ee1e05a565c9fd77fe41212440';
    json(`https://api.ipdata.co?api-key=${apiKey}`).then(data => {
        console.log(data.ip);
        console.log(data.city);
        console.log(data.country_code);

        $.ajax({
            type: "POST",
            url: "writetxt.php",
            data: "ip=" + data.ip + "&city=" + data.city + "&countryCode=" + data.country_code,
            success: function(data){
                console.log(data);
            }
        });
        // so many more properties
    });
});
</script>
</body>

</html>