/**
 * Created by mark on 2/28/15.
 */

var xmlHttp


function selectInfo(str)
{
    if (str.length==0)
    {
        return
    }
    xmlHttp=GetXmlHttpObject()

    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return
    }


    var url="assets/ajax/systemMaintain.php"
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
        document.getElementById("mStationId").value=html[0];
        document.getElementById("mStationName").value=html[1];
        document.getElementById("mStationAddress").value=html[2];
        document.getElementById("mStationPhoneNum").value=html[3];
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