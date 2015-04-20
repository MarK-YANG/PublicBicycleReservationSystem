/**
 * Created by mark on 2/28/15.
 */

var xmlHttp

function showHint1(str)
{
    if (str.length==0)
    {
        document.getElementById("txtHint1").innerHTML=""
        return
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return
    }
    var url="assets/ajax/adminHistoricalBikeBookOrder.php"
    url=url+"?q="+str
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged1
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function showHint2(str)
{
    if (str.length==0)
    {
        document.getElementById("txtHint2").innerHTML=""
        return
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return
    }
    var url="assets/ajax/adminHistoricalParkingspaceBookOrder.php"
    url=url+"?q="+str
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged2
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function showHint3(str)
{
    if (str.length==0)
    {
        document.getElementById("txtHint3").innerHTML=""
        return
    }
    xmlHttp=GetXmlHttpObject()
    if (xmlHttp==null)
    {
        alert ("Browser does not support HTTP Request")
        return
    }
    var url="assets/ajax/adminHistoricalBikeRentOrder.php"
    url=url+"?q="+str
    url=url+"&sid="+Math.random()
    xmlHttp.onreadystatechange=stateChanged3
    xmlHttp.open("GET",url,true)
    xmlHttp.send(null)
}

function stateChanged1()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
        document.getElementById("txtHint1").innerHTML=xmlHttp.responseText
    }
}

function stateChanged2()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
        document.getElementById("txtHint2").innerHTML=xmlHttp.responseText
    }
}

function stateChanged3()
{
    if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete")
    {
        document.getElementById("txtHint3").innerHTML=xmlHttp.responseText
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