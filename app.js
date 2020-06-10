$(document).ready(function () {


    $.ajax({
        url: "http://localhost/data.php",
        method: "GET",
        success: function (data) {
            var name=[];
            var diameter=[];

            for(var i in data)
            {
                name.push("name "+data[i].name);
                diameter.push(data[i].diameter);
            }

            var chartdata={
                labels:name;
                datasets:[{
                    label:"Coin diameter",
                    backgroundColor:'rgba(200,200,200,0.75)',
                    borderColor:'rgba(200,200,200,0.75)',
                    hoverBackgroungdColor:'rgba(200,200,200,1)',
                    hoverBorderColor:'rgba(200,200,200,1)',
                    data:diameter;
                }]
            };
            var ctx=$("#mycanvas");

            var bargraph=new Chart


        },
        error: function (data) {
            console.log(data);
        }
    });
});