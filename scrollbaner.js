function ScrollBaner(init) {
	if (init) for(i in aScrBanTab) aScrBanTab[i][1]=Math.random()*aScrBanTab[i][2];
	for(i in aScrBanTab) {
		posx=aScrBanTab[i][1]-aScrBanTab[i][3];
		if (posx<-aScrBanTab[i][2]) posx+=aScrBanTab[i][2];
		aScrBanTab[i][1]=posx;
		document.getElementById(aScrBanTab[i][0]).style.backgroundPosition=posx+"px 0";
	}
	setTimeout("ScrollBaner()",cScrBanDel);
}

ScrBanPar=document.getElementById(cScrBanNam);
for(i in aScrBanTab) {
	var ScrBanChl=document.createElement("DIV");
	ScrBanChl.id=aScrBanTab[i][0];
	ScrBanPar.appendChild(ScrBanChl);
}
setTimeout("ScrollBaner(1)",100);