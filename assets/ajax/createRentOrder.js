/**
 * Created by mark on 2/28/15.
 */

var xmlHttp


function selectInfo(str)
{
    if (str.length==0)
    {
        document.getElementById("selectName").innerHTML="Error"
        return
    }
    xmlHttp=GetXmlHttpObject()

    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return
    }


    var url="assets/ajax/createRentOrder.php"
    url=url+"?q="+str;
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function stateChanged()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
        var html = xmlHttp.responseText.split(":");
        document.getElementById("rStationId").innerHTML=html[0];
        document.getElementById("rStationName").innerHTML=html[1];
        document.getElementById("rStationAddress").innerHTML=html[2];
        document.getElementById("rStationPhoneNum").innerHTML=html[3];
        document.getElementById("rBikeCount").innerHTML=html[4];
    }
}

function GetXmlHttpObject()
{
    var xmlHttp=null;
    try
    {
        // Firefox, Opera 8.0+, Safari
        xmlHttp=new XMLHttpRequest();
    }
    catch (e)
    {
        // Internet Explorer
        try
        {
            xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
        }
        catch (e)
        {
            xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlHttp;
}

function test(str){
    document.getElementById("myTest").value = str
}