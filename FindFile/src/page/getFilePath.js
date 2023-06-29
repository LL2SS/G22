let Path=null;
//获取文件夹路径

$(document).ready(function() {
    $("#SelectBtn").click(function() {
        //获取文件夹路径

        $.ajax({
            url: "src/server/getPath.php",
            type: "GET",
            success: function(data) {
              console.log(data); 
            },
            error: function(error) {
              console.log(error); 
            }
        });

        for(i=0;i<event.target.files.length;i++){

            const folderPath = event.target.files[i].webkitRelativePath; //获取单个文件目录
            Path = folderPath.split("/");  //获取文件详细地址
            console.log(folderPath);
            console.log(Path);

            $.post("src/server/getPath.php",{
                "folderPath" : folderPath,
                "Path" : Path,
                "i" : i
            },function(data){
                
            },"json");

            GetText(folderPath);

        }

    }); 

});
  $("#ConfirmBtn").on("change", function(event) {

    for(i=0;i<event.target.files.length;i++){

        const folderPath = event.target.files[i].webkitRelativePath; //获取单个文件目录
        Path = folderPath.split("/");  //获取文件详细地址
        console.log(folderPath);
        console.log(Path);

        $.post("src/server/SavePath.php",{
            "folderPath" : folderPath,
            "Path" : Path,
            "i" : i
        },function(data){
            
        },"json");

        GetText(folderPath);

    }

  }); 