let Path=null;

// 获取文件夹路径
$("#folder-input").on("change", function(event) {
    for(i=0;i<event.target.files.length;i++){
        const folderPath = event.target.files[i].webkitRelativePath;
        Path = folderPath.split("/");
        console.log(folderPath);
        console.log(Path);
        console.log(Path[1]);
        $.post("src/server/SavePath.php",{
            "folderPath" : folderPath,
            "Path" : Path,
            "i" : i
        },function(data){
            
        },"json");
    }
  }); 