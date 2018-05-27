if (document.location.href.indexOf("eldiario.es") != -1) {
var body = document.body;
if (window.self !== window.top) {
body = parent.document.body;
}
element = parent.document.getElementsByClassName("rg-grp")[0];
element.style.backgroundColor = "transparent";
element.style.width = "980px";

element = parent.document.getElementsByClassName("ad-wrap")[0];
element.style.width = "980px";

element = parent.document.getElementsByClassName("stickers-static")[0];
element.style.display = "none";

element = parent.document.getElementsByClassName("rg-wrap")[0];
element.style.backgroundColor = "#fff";
element.style.width = "996px";
element.style.margin = "auto";

element = parent.document.getElementById("main");
element.style.backgroundColor = "transparent";
element.style.overflow = "visible";
element.style.width = "980px";

element = parent.document.getElementById("edi-adv-head-container");
element.style.background = "transparent";
element.style.width = "996px";
element.style.overflow = "visible";

element = parent.document.getElementById("container");
element.style.width = "996px";

element = parent.document.getElementById("headerCookiesAdvice");
element.style.position = "absolute";
element.style.width = "100%";
element.style.left = "0px";
element.style.zIndex = "1212123";

element = parent.document.getElementById("edi-ad-slot-ED_medio_banner_cabecera");
element.style.display = "none";

element = parent.document.getElementById("google_ads_iframe_/123333327/ED_banner_horizontal_0");
element.style.width = "980px";

element = parent.document.getElementById("edi-ad-slot-ED_horizontal_cabecera_8387706640983392256");
element.style.width = "980px";

element = parent.document.getElementById("google_ads_iframe_/123333327/ED_horizontal_0");
element.style.width = "980px";

} else if (document.location.href.indexOf("infolibre") != -1) {
var body = document.body;
if (window.self !== window.top) {
body = parent.document.body;
}
element = parent.document.getElementById("div-gpt-ad-sky-izq");
element.style.top = "1024px";

element = parent.document.getElementById("div-gpt-ad-sky-der");
element.style.top = "1024px";

element = parent.document.getElementById("cab");
element.style.zIndex = "5555";

} else
if (document.location.href.indexOf("elconfidencialdigital.com") != -1) {
var body = document.body;
if (window.self !== window.top) {
body = parent.document.body;
}
element = parent.document.getElementsByClassName("document1")[0];
element.style.background = "none";

element = parent.document.getElementsByClassName("ad-sky")[0];
element.style.top = "1024px";

element = parent.document.getElementsByTagName("html")[0];
element.style.background = "transparent";
element.style.overflowX = "hidden";

element = parent.document.getElementById("bbt-ad-slot-horizontal3");
element.style.background = "none";
element.style.height = "200px";

element = parent.document.getElementById("container");
element.style.width = "1024px";
element.style.margin = "auto";

element = parent.document.getElementsByClassName("rg")[1];
element.style.backgroundColor = "#0c2d4f";
element.style.width = "1024px";
element.style.margin = "auto";
element.style.borderRadius = "5px";

}