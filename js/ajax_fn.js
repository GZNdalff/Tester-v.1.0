function createXMLHttp()
{
  var oXmlHttp;
  if(window.ActiveXObject)
  {
    var aVersions=["Msxml2.XMLHTTP.6.0","Msxml2.XMLHTTP.5.0","Msxml2.XMLHTTP.4.0","Msxml2.XMLHTTP.3.0","Msxml2.XMLHTTP","Microsoft.XMLHttp"];
    for(var i=0;i<aVersions.length;i++)
    {
      try
      {
        oXmlHttp=new ActiveXObject(aVersions[i]);
        break;
      }
      catch(oError)
      {
      oXmlHttp=false;
      }
    }
  }
  else if(typeof(XMLHttpRequest)!='undefined')
  {
    oXmlHttp=new XMLHttpRequest();
  }
  else
  {
    oXmlHttp=false;
  }
  return oXmlHttp;
}


function SendPOSTRequest(htmlEl,oFormID)
{
  var oXmlHttp=createXMLHttp();
  var oForm=document.getElementById(oFormID);
  var sBody=getRequestBody(oForm);
  oXmlHttp.open("POST",oForm.action,true);
  oXmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
  oXmlHttp.onreadystatechange=function()
  {
    if(oXmlHttp.readyState==4)
      {
        if(oXmlHttp.status==200)
        {
          SaveHTMLResult(oXmlHttp.responseText,htmlEl);
        }
        else
        {
          SaveHTMLResult("Connection Error: "+oXmlHttp.statusText,htmlEl);
        }
      }
  };
  oXmlHttp.send(sBody);
}


function getRequestBody(oForm)
{
  var aParams=new Array();
  for(var i=0;i<oForm.elements.length;i++)
  {
    var sParam=encodeURIComponent(oForm.elements[i].name);
    sParam+="=";
    sParam+=encodeURIComponent(oForm.elements[i].value);
    aParams.push(sParam);
  }
  return aParams.join("&");
}


function SaveHTMLResult(sText,htmlEl)
{
  var sElem=document.getElementById(htmlEl);
  sElem.innerHTML=sText;
}


function SendGetRequest(URL,htmlEl)
{
  var oXmlHttp=createXMLHttp();
  oXmlHttp.onreadystatechange=function()
    {
      if(oXmlHttp.readyState==4)
      {
        if(oXmlHttp.status==200)
        {
          SaveHTMLResult(oXmlHttp.responseText,htmlEl);
        }
        else
        {
          SaveHTMLResult("Connection Error: "+oXmlHttp.statusText,htmlEl);
        }
      }
    };
  oXmlHttp.open("GET",URL,true);oXmlHttp.send(null);
}