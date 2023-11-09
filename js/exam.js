function transfer_data2()
{
    var opt = document.f1.radio.value;
    $.ajax({
        type: 'POST',
        url: 'exam2.php',
        data: { 
            radopt: opt
        }
    });
    return false;
}

function transfer_data3()
{
    var opt = document.f1.radio.value;
    $.ajax({
        type: 'POST',
        url: 'exam3.php',
        data: { 
            radopt: opt
        }
    });
    return false;
}





