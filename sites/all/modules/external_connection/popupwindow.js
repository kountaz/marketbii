function popup(mylink, windowname, width, height)
{
	if (! window.focus)return true;
	var href;
	if (typeof(mylink) == 'string')
	   href=mylink;
	else
	   href=mylink.href;
	   
	var centeredY,centeredX;
	centeredY = (screen.height - height)/2;
	centeredX = (screen.width - width)/2;	
	window.open(href, windowname, 'width='+width+',height='+height+',scrollbars=yes,left=' + centeredX +',top=' + centeredY).focus();
	return false;
}