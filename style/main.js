//���Ұ�ť����������ʼ
function fb_button(a){
		//���ݵ�����Ұ�ť�Ӽ�bingflag��ֵ
        bingflag=bingflag+a;
        if(bingflag<0)bingflag=0;
		if(bingflag>7)bingflag=7;
		
		//����bingflag��ֵѡ��ͼƬ��ʼ
		switch(bingflag)
		{
		case 0:
		  jsbinginfo = jsbinginfo0;
		  break;
		case 1:
		  jsbinginfo = jsbinginfo1;
		  break;
		case 2:
		  jsbinginfo = jsbinginfo2;
		  break;
		case 3:
		  jsbinginfo = jsbinginfo3;
		  break;
		case 4:
		  jsbinginfo = jsbinginfo4;
		  break;
		case 5:
		  jsbinginfo = jsbinginfo5;
		  break;
		case 6:
		  jsbinginfo = jsbinginfo6;
		  break;
		case 7:
		  jsbinginfo = jsbinginfo7;
		  break;
		default:
		  jsbinginfo = jsbinginfo0;
		}

		//��ָ��id���html����
		document.getElementById("info_bingimg").innerHTML=jsbinginfo[1];
		document.getElementById("info_title_b").innerHTML=jsbinginfo[2];
		document.getElementById("info_title_c").innerHTML=jsbinginfo[3] + "&ensp;|&ensp;" + jsbinginfo[4];
		document.getElementById("info_story").innerHTML=jsbinginfo[5];
		document.getElementById("downloadimg").href=jsbinginfo[0];
		document.getElementById("nav_full_img").src=jsbinginfo[0];

    //��һ��js
    var styleList = [];
    function callback_179_config(params){
        styleList = params.list || [];
    }

    //�ڶ���js
    var bg_img = $$('lay_bg_img');
    if(styleList.length === 0){
        styleList.push({
            bg : jsbinginfo[0]
        });
    }
    var randomData = Math.floor(Math.random() * styleList.length);

    //������js
    window.QZFL = window.QZONE = window.QZFL || window.QZONE || {};
    QZFL.dom = {
        getClientHeight:function(doc){
            var _doc = doc || document;
            return _doc.compatMode == "CSS1Compat"?_doc.documentElement.clientHeight:_doc.body.clientHeight;
        },
        getClientWidth:function(doc){
            var _doc = doc || document;
            return _doc.compatMode == "CSS1Compat"?_doc.documentElement.clientWidth:_doc.body.clientWidth;
        }
    };

    QZONE.LoginPage = {
        bootStrap:function(){
            var lp = QZONE.LoginPage,sl_url = $$('small_url');
            bg_img.src = styleList[randomData].bg;

            window.onload = function(){
                lp.resizeBackground();
            };

            if(p_smallPic){
                sl_url.innerHTML = '<span class="img_slogan"></span>';
            }
            window.onresize = function(){
                lp.resizeBackground();

            };
        },

        resizeBackground:function(){
            var bg = $$('lay_bg'),
                bg_img = $$('lay_bg_img'),
                cw = QZFL.dom.getClientWidth(),
                ch = QZFL.dom.getClientHeight(),
                iw = bg_img.width,
                ih = bg_img.height;
            bg.style.width = cw + "px";
            bg.style.height = ch + "px";
            if(cw / ch > iw / ih){
                var new_h = cw * ih / iw, imgTop = (ch - new_h) / 2;
                bg_img.style.width = cw + "px";
                bg_img.style.height = new_h + "px";
                bg_img.style.top = imgTop + "px";
                bg_img.style.left = "";
            }else{
                var new_w = ch * iw / ih, imgLeft = (cw - new_w) / 2;
                bg_img.style.width = new_w + "px";
                bg_img.style.height = ch + "px";
                bg_img.style.left = imgLeft + "px";
                bg_img.style.top = "";
            }
        },
    };
    QZONE.LoginPage.bootStrap();
//����bingflag��ֵѡ��ͼƬ����		
}//���Ұ�ť������������


	//�Ҳ�˵�����js
    var flag = 0;
    jQuery('.li_right_menu').click(function() {
        if(flag == 0) {
            $('.lay_wrap,.lay_foot,.dicen').animate({width: '75%'},350);
            $('.navs').animate({width:'toggle'},350);
            flag = 1;
        } else {
            $('.lay_wrap,.lay_foot').animate({width: '100%'},350);
            $('.navs').animate({width:'toggle'},350);
            flag = 0;
        }
    });
	
	jQuery('.dicen,.middle_box').click(function() {
        if(flag == 1) {
            $('.lay_wrap,.lay_foot').animate({width: '100%'},350);
            $('.navs').animate({width:'toggle'},350);
            flag = 0;
        }
    });
	
	//���˵�����js
        $(document).ready(function(){
        $('.nav_left').click(function(){
            $('.nav_full,.nav_full_bg').animate({width:'toggle'},350);
        });
    });
	
	//����������ͼ����js
	var infoflag = 0;
    jQuery('.fb_info').click(function() {
        if(infoflag == 0) {
            $('.fb_info_b,.fb_info_d').animate({width:'toggle'},350);
            infoflag = 1;
        } else {
            $('.fb_info_b,.fb_info_d').animate({width:'toggle'},350);
            infoflag = 0;
        }
    });
	
	jQuery('.dicen,.middle_box').click(function() {
        if(infoflag == 1) {
            $('.fb_info_b,.fb_info_d').animate({width:'toggle'},350);
            infoflag = 0;
        }
    });