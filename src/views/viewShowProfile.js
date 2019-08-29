function showNameAndIdSchedule()
{
    $.ajax({
        url:"../controls/saveDataUserProfile.php",
        type:'POST',
        data:'asd',
        dataType:'json',
        success:function(array)
        {
            $("#pa1").append($_SESSION['identi']);
            $("#pa2").append(array[1]);
            $("#pa3").apeend(array[2]);
        }
    });
}
showNameAndIdSchedule();