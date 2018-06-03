(function(window) {
	function Ticketon() {}
	Ticketon.prototype = {
		_fnStringify: function (obj) {
			var t = typeof (obj);
			if (t != "object" || obj === null) {
				if (t == "string") obj = '"'+obj+'"';
				return String(obj);
			} else {
				var n, v, json = [], arr = (obj && obj.constructor == Array);
				for (n in obj) {
					v = obj[n]; t = typeof(v);
					if (t == "string") v = '"'+v+'"';
					else if (t == "object" && v !== null) v = ticketon._fnStringify(v);
					json.push((arr ? "" : '"' + n + '":') + String(v));
				}
				return (arr ? "[" : "{") + String(json) + (arr ? "]" : "}");
			}
		},
		Stringify: function(obj) {
			if (!!JSON && !!JSON.stringify) {
				return JSON.stringify(obj);
			} else {
				return ticketon._fnStringify(obj);
			}
		},
		OverlayID:null,
		FrameID:null,
		WrapID:null,
		LoaderID:null,
		BorderFrameID:null,
		ReturnURL:null,
		CommandURL:null,
		Dev:false,
		Consumer:null,
		FrameHashWatcherIvl:null,
		XDHashCheckInterval:null,
		Lang:'ru',
		Transmit:{},
		BodyInitialOverflow:'auto',
		OverrideOverflow:true,
		TryMobile:true,
		sizeX: 770,
		sizeY: 510,
		overrideOverflow: function(bool) {
			if (typeof(bool) == 'undefined') {
				return this.OverrideOverflow;
			}
			this.OverrideOverflow = !!bool;
			return this;
		},
		decorateSrc: function(url, callback) {
			try {
				if (!window.GoogleAnalyticsObject || !window[window.GoogleAnalyticsObject] || !(typeof(window[window.GoogleAnalyticsObject]) == 'function')) return callback(url);
				window[window.GoogleAnalyticsObject](function(tracker) {
					try {
						window.linker = window.linker || new window.gaplugins.Linker(tracker);
						callback(window.linker.decorate(url));
					} catch (e) {
						callback(url);
					}
				});
			} catch (e) {
				callback(url);
			}
		},
		getWindowHeight: function() {
			var h = 0;
			if( typeof( window.innerWidth ) == 'number' ) {
				h = window.innerHeight;
			} else if( document.documentElement && ( document.documentElement.clientWidth || document.documentElement.clientHeight ) ) {
				h = document.documentElement.clientHeight;
			} else if( document.body && ( document.body.clientWidth || document.body.clientHeight ) ) {
				h = document.body.clientHeight;
			}
			return h;
		},
		setWindowResize: function() {
			if (window.addEventListener){
				window.addEventListener("resize", ticketon.WindowResize, false);
			} else if (window.attachEvent){
				window.attachEvent('resize', ticketon.WindowResize);
			}
		},
		getScrollTop: function() {
			if (typeof window.pageYOffset != 'undefined'){
				return window.pageYOffset;
			} else {
				var B = document.body; //IE 'quirks'
				var D = document.documentElement; //IE with doctype
				return ((D.clientHeight) ? D: B).scrollTop || 0;
			}
		},
		WindowResize: function() {
			var w = document.getElementById(ticketon.WrapID);
			var c = document.getElementById(ticketon.FrameID);
			var wh = ticketon.getWindowHeight();
			w.style.top = ticketon.getScrollTop() + 'px';
			c.style.top = (wh > c.offsetHeight ? ((wh - c.offsetHeight) / 2) : 0) + 'px';
		},
		fnHasProp:function(obj, prop) {
			if (typeof(obj) != 'object') return false;
			if (!Object.prototype.hasOwnProperty) {
				var proto = obj.__proto__ || obj.constructor.prototype;
				return (prop in obj) && (!(prop in proto) || proto[prop] !== obj[prop]);
			} else {
				return Object.prototype.hasOwnProperty.call(obj, prop);
			}
		},
		InitDialog:function (a,b) {
			try {
				ticketon.tryMobile();
				if (ticketon.overrideOverflow()) {
					ticketon.BodyInitialOverflow = document.body.style.overflow.toString() || 'auto';
					document.body.style.overflow = 'hidden';
				}

				var top = ticketon.getScrollTop();

				var w = document.getElementById(ticketon.WrapID);
				w.style.cssText = 'position:absolute;top:'+top+'px;left:0;width:100%;height:100%;overflow:auto;z-index:65010;';
				var o = document.getElementById(ticketon.OverlayID);
				o.style.cssText = 'position:fixed;width:100%;height:100%;top:0;left:0;background:#000;opacity:0.4;z-index:65009;filter:progid:DXImageTransform.Microsoft.Alpha(opacity=40);';
				var c = document.getElementById(ticketon.FrameID);
				c.style.cssText = 'position:relative;padding:4px;display:block;zoom:1;margin:0 auto;box-shadow:0 0 30px -5px #000;-moz-box-shadow:0 0 30px -5px #000;-webkit-box-shadow:0 0 30px -5px #000;border:none;overflow:auto;z-index:65010;box-sizing:content-box;'
					+'width:'+a+'px;height:'+b+'px';

				ticketon.WindowResize();

				setTimeout(function() {
					window.scrollTo(0,top);
				}, 1);

			} catch (e) {ticketon.errorLog(e)}
		},
		Exec:function() {
			return {
				command:function(c, o, cb) {
					try {
						var params = '';
						if (!o) o={};
						if (!!o.Params) {
							o.Params.lang=ticketon.Lang.toString();
							if (typeof(ticketon.Transmit) == 'object') {
								o.Params.transmit=ticketon.Stringify(ticketon.Transmit);
							} else {
								o.Params.transmit=ticketon.Transmit.toString();
							}
							params = ticketon.getParams(o.Params);
						}
						var l = document.createElement("div");
						l.setAttribute("id", ticketon.LoaderID);
						l.style.cssText = 'position:absolute; z-index:3; top: 4px; left:4px; bottom:4px; right:4px; text-align:center; background:url("'+ticketon.getStaticBase()+'i/ticketon-loader.gif") no-repeat scroll center center #DEE0E3;';
						var b = document.createElement("div");
						b.id = ticketon.BorderFrameID;
						b.style.cssText = 'position:absolute; z-index:1; top: 0; left:0; bottom:0; right:0;background:#FFF;';

						var mf = document.getElementById(ticketon.FrameID);
						mf.innerHTML = '';
						mf.appendChild(l);
						mf.appendChild(b);
						var ifr = document.createElement('iframe');
						var ifrload = function() {
							ticketon.WindowResize();
							if (ifrLoaded) return;
							ifrLoaded = true;
							l.style.display = 'none';
						};
						if (ifr.addEventListener) {
							ifr.addEventListener("load",ifrload,false);
						} else if (ifr.attachEvent) {
							ifr.attachEvent("onload",ifrload);
						}
						ifr.id = ifr.name = 'frame_'+ticketon.FrameID;
						ifr.className = 'ticketon-iframe';
						ifr.src = 'about:blank';
						ifr.style.cssText = 'display:none;border:0;position:relative;z-index:2;top:0;left:0;margin:0;padding:0;';
						ifr.scrolling = 'no';
						ifr.frameborder = '0';
						ifr.allowTransparency = 'true';
						var ifrLoaded = false;
						var src = ticketon.CommandURL+'?'+ticketon.getParams({action:c,'return':(!!o.ReturnURL)?o.ReturnURL:ticketon.ReturnURL})+'&'+params;
						ticketon.decorateSrc(src, function(src) {
							ifr.src = src;
							mf.appendChild(ifr);
							cb();
						})
					} catch (e) {ticketon.errorLog(e)}
				},
				setStyle:function(o) {
					try {
						if (!o) o={};
						document.getElementById(ticketon.OverlayID).style.display="block";
						var n = document.getElementById("frame_" + ticketon.FrameID);
						for (var s in o) {
							if (!!o[s]) n.style[s] = o[s];
						}
						n.style.display = "block";
					} catch (e) {ticketon.errorLog(e)}
				},
				hash:function(h) {
					try {
						if (!h.match(/^\#\!.*/)) return;
						var c = h.replace(/^\#\!(.*)/, '$1').split('&');
						var e = {};
						var f = function(c) {e[c[0]]=c[1]};
						for(var i=0,l=c.length;i<l;i++) {
							if (!!c[i]) f(c[i].split('='));
						}
						if (!!e.exec) { ticketon[e.exec].call(this,e); }
					} catch (e) {ticketon.errorLog(e)}
				}
			}
		},
		getBaseDomain:function () {
			return 'https://'+(ticketon.Dev?'dev-':'')+'widget.ticketon.kz';
		},
		getStaticBase:function () {
			return 'https://'+(ticketon.Dev?'dev-':'')+'static.ticketon.kz/widget/';
		},
		getEmbedDomain:function () {
			return 'https://'+(ticketon.Dev?'dev-':'')+'embed.ticketon.kz/';
		},
		getParams:function (p) {
			var s = [];
			for(var n in p) {
				if (!ticketon.fnHasProp(p,n)) continue;
				s.push(n + '=' + encodeURIComponent((p[n]?p[n]:false).toString()));
			}
			return s.join('&');
		},
		getGuid: function () {
			return (function (d) {
				var g = function () {
					return (((1 + Math.random()) * 0x10000) | 0).toString(16).substring(1).toUpperCase();
				};
				return (g()+g()+d+g()+d+g()+d+g()+d+g()+g()+g());
			})('-');
		},
		getConsumerKey:function () {
			return '1-1-1-1';
		},
		closeWidget:function () {
			document.getElementById(ticketon.FrameID).removeChild(document.getElementById('frame_'+ticketon.FrameID));
			document.getElementById(ticketon.WrapID).style.display = 'none';
			document.getElementById(ticketon.FrameID).style.display = 'none';
			document.getElementById(ticketon.OverlayID).style.display = 'none';
			document.getElementById(ticketon.BorderFrameID).style.display = 'none';
			if (ticketon.overrideOverflow()) {
				document.body.style.overflow = ticketon.BodyInitialOverflow;
			}
		},
		openWidget:function (consKey,event,city,date) {
			ticketon.InitDialog(ticketon.sizeX,ticketon.sizeY);
			ticketon.Exec().command('sessions', {Params:{event:event,city:city,date:date}}, function() {
				ticketon.Exec().setStyle({width:ticketon.sizeX + 'px',height:ticketon.sizeY + 'px'});
			});
		},
		openAffiche:function(city,date) {
			ticketon.InitDialog(ticketon.sizeX,ticketon.sizeY);
			ticketon.Exec().command('affiche', {Params:{date:date}}, function() {
				ticketon.Exec().setStyle({width:ticketon.sizeX + 'px',height:ticketon.sizeY + 'px'});
			});
		},
		openFilmSchedule:function (event,city,date) {
			ticketon.openEvent(event,city,date);
		},
		openEvent:function(event,city,date) {
			ticketon.openWidget(ticketon.getConsumerKey(),event,city,date);
		},
		openTheatreSchedule:function (place,date) {
			ticketon.openPlace(place,date);
		},
		openPlace:function(place,date) {
			ticketon.InitDialog(ticketon.sizeX,ticketon.sizeY);
			ticketon.Exec().command('sessions', {Params:{place:place,date:date}}, function() {
				ticketon.Exec().setStyle({width:ticketon.sizeX + 'px',height:ticketon.sizeY + 'px'});
			});
		},
		openHallPlan:function (place,event,date) {
			ticketon.openShow(place,event,date);
		},
		openShow:function(place,event,date) {
			ticketon.InitDialog(ticketon.sizeX,ticketon.sizeY);
			ticketon.Exec().command('places', {Params:(!event&&!date)?({show:place}):({event:event,place:place,date:date})}, function() {
				ticketon.Exec().setStyle({width:ticketon.sizeX + 'px',height:ticketon.sizeY + 'px'});
			});
		},
		setSize: function(sizeX, sizeY) {
			this.sizeX = sizeX || this.sizeX;
			this.sizeY = sizeY || this.sizeY;
			return this;
		},
		setWidgetsStyles:function () {
			var s = document.createElement("link");
			s.setAttribute("rel", "stylesheet");
			s.setAttribute("type", "text/css");
			s.setAttribute("href", ticketon.getStaticBase() + 'consumer.css');
			document.getElementsByTagName('head')[0].appendChild(s);
		},
		addWidgetPlaces:function (d) {
			var n = document.createElement('a');
			n.className = 'tcn-widget tcn-widget-btn-time tcn-widget-c-{c} tcn-widget-f-{f} tcn-widget-t-{t}'.replace('{t}', d.place||d.theatre).replace('{f}', d.event||d.film).replace('{c}', ticketon.Consumer);
			n.href = 'javascript:ticketon.openShow({t}, {f}, {d})'.replace('{t}', (d.place||d.theatre)).replace('{f}', (d.event||d.film)).replace('{d}', d.ts);
			var t = new Date(d.ts*1000),h=t.getHours(),m=t.getMinutes();
			n.innerHTML = !!d.text ? d.text : ((h>9?h:'0'+h)+':'+(m>9?m:'0'+m));
			return n;
		},
		addWidgetSchedule:function (d) {
			var n = document.createElement('a');
			n.className='tcn-widget tcn-widget-btn-tickets tcn-widget-c-{c} tcn-widget-f-{f} tcn-widget-t-{t}'.replace('{t}', d.place||d.theatre).replace('{f}', d.event||d.film).replace('{c}', ticketon.Consumer) + (!!d.css?' tcn-'+d.css:'');
			if (!d.date) d.date = (function(){var _=new Date();return (_.getDate()+'.'+(_.getMonth()+1)+'.'+_.getFullYear())})();
			if (!!(d.event||d.film)) {
				n.href = 'javascript:ticketon.openEvent({f}, \'{c}\', \'{d}\')'.replace('{f}', d.event||d.film).replace('{c}',(d.city || ''));
			} else if (!!(d.place||d.theatre)) {
				n.href = 'javascript:ticketon.openPlace({t}, \'{d}\')'.replace('{t}', d.place||d.theatre);
			} else {
				n.href = '#';
			}
			n.href = n.href.replace('{d}',(d.date || ((new Date).getTime()/1000)));
			n.innerHTML='<div class="tcn-widget-btn-s tcn-widget-btn-s-l"></div><div class="tcn-widget-btn-text">'+(!!d.text?d.text:'Билеты')+'</div><div class="tcn-widget-btn-s tcn-widget-btn-s-r"></div>';
			return n;
		},
		addWidgetFilm:function (d) {
			var n = document.createElement('a');
			if (!d.date) d.date = (function(){var _=new Date();return (_.getDate()+'.'+(_.getMonth()+1)+'.'+_.getFullYear())})();
			n.className = 'tcn-widget tcn-widget-film';
			n.href = 'javascript:ticketon.openEvent({f}, \'{c}\', \'{d}\')'.replace('{f}', d.event||d.film).replace('{c}',d.city).replace('{d}',d.date);
			n.innerHTML = '<span class="tcn-widget-film-icon">&nbsp;</span><span class="tcn-widget-film-text">Купить билет</span>';
			return n;
		},
		addWidgetPromo:function(d) {
			var n = document.createElement('a');
			n.className='tcn-widget tcn-widget-promo';
			if (!d.date) d.date = (function(){var _=new Date();return (_.getDate()+'.'+(_.getMonth()+1)+'.'+_.getFullYear())})();
			if (!!(d.event||d.film)) {
				n.href = 'javascript:ticketon.openEvent({f}, \'{c}\', \'{d}\')'.replace('{f}', d.event||d.film).replace('{c}',(d.city || ''));
			} else if (!!(d.place||d.theatre)) {
				n.href = 'javascript:ticketon.openPlace({t}, \'{d}\')'.replace('{t}', d.place||d.theatre);
			} else {
				n.href = '#';
			}
			n.href = n.href.replace('{d}',(d.date || ((new Date).getTime()/1000)));
			n.innerHTML='<img src="'+ticketon.getStaticBase()+'i/btn-promo'+(d.personal==='true'?'-'+(d.place||d.theatre):'')+'.png" alt="Купить билеты он-лайн"/>';
			return n;
		},
		addScript: function (c, d) {
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.src = c + '&' + ticketon.getParams(d);
			document.body.appendChild(s);
		},
		addWidgetEmbed: function (d, n) {
			if (!n.id) {
				n.id = 'tcn_' + ticketon.getGuid();
			}
			d.id = n.id;
			d.host = window.top.location.href;
			d.callback = 'ticketon.setEmbed';
			ticketon.addScript(ticketon.getEmbedDomain() + '?', d);
			return false;
		},
		setEmbed: function (code, id, o) {
			var f, p, n = document.getElementById(id);
			if (!!o.frame) {
				f = ticketon.createEmbedFrame(o.frame, id);
				n.parentNode.insertBefore(f, n);
				f.contentWindow.document.write(code);
				f.contentWindow.document.close();
			} else {
				f = document.createDocumentFragment();
				p = document.createElement('div');
				p.innerHTML = code;
				while (p.firstChild) {
					if (p.firstChild.nodeName.toLowerCase() === 'script') {
						(function(s, c, h) {
							s.type = "text/javascript";
							try {
								s.appendChild(document.createTextNode(c));
							} catch(e) {
								s.text = c;
							}
							h.insertBefore(s, h.firstChild);
							h.removeChild(s);
						})(document.createElement("script"), (p.firstChild.text || p.firstChild.textContent || p.firstChild.innerHTML || "" ), (document.getElementsByTagName("head")[0] || document.documentElement));
						p.removeChild(p.firstChild);
					} else {
						f.appendChild(p.firstChild);
					}
				}
				n.parentNode.insertBefore(f, n);
			}
		},
		createEmbedFrame:function(o, id) {
			var f = document.createElement("iframe");
			f.name = ticketon.fnHasProp(o, 'name') ? o.name : 'ifr-'+id;
			f.id = 'ifr-'+id;
			f.style.cssText = ticketon.fnHasProp(o, 'css') ? o.css : 'border:none;width:0;height:0;';
			f.className = ticketon.fnHasProp(o, 'class') ? o['class'] : '';
			f.allowTransparency = true;
			f.frameBorder = 0;
			f.scrolling = "no";
			return f
		},
		getData: function(e) {
			var d={};
			for(var x=0;x<e.attributes.length;x++){
				d[e.attributes[x].nodeName]=e.attributes[x].nodeValue;
			}
			return d;
		},
		addWidget:function (n) {
			if (!!n.isAttached) return false;
			var d=ticketon.getData(n);
			var r=(function(d) {
				if (!!d.type) switch (d.type) {
					case 'places':{return ticketon.addWidgetPlaces(d);}
					case 'schedule':{return ticketon.addWidgetSchedule(d);}
					case 'film':{return ticketon.addWidgetFilm(d);}
					case 'promo':{return ticketon.addWidgetPromo(d);}
					case 'embed':{return ticketon.addWidgetEmbed(d,n);}
					default: return false;
				}
				return false;
			})(d);
			if (!r) return false;
			n.parentNode.appendChild(r);
			return n.isAttached=true;
		},
		setWidgets:function () {
			try {
				var w = document.getElementsByTagName('tcn:widget');
				for (var i=0,l=w.length;i<l;i++) {
					ticketon.addWidget(w[i]);
				}
				ticketon.setWidgetsStyles();
			} catch (e) {ticketon.errorLog(e)}
		},
		loadHash:function (hash) {
			hash = hash.split(':');
			if (hash[0]!='#!ticketon') return;
			var action = hash[1];
			hash.splice(0,2);
			ticketon[action].apply(ticketon,hash);
		},
		isMobile:function() {
			return (function(a){return(/android.+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|e\-|e\/|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(di|rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|xda(\-|2|g)|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))})(navigator.userAgent||navigator.vendor||window.opera);
		},
		tryMobile:function(i) {
			if (typeof (i) !== 'undefined') {
				ticketon.TryMobile = i;
				return ticketon;
			}
			var isMobile = ticketon.isMobile();
			if (!!ticketon.TryMobile && isMobile && confirm('Хотите ли Вы перейти на мобильную версию сервиса?')) ticketon.openMobile();
			return isMobile;
		},
		openMobile:function () {
			window.location.href = 'https://m.ticketon.kz/';
		},
		loaded:false,
		load:function () {
			try {
				if (ticketon.loaded) return;
				ticketon.loaded = true;
				ticketon.OverlayID = "ticketonWidgetOverlay";
				ticketon.WrapID = "ticketonWidgetWrapper";
				ticketon.FrameID = "ticketonWidgetContainer";
				ticketon.LoaderID = "ticketonWidgetLoader";
				ticketon.BorderFrameID = "ticketonWidgetBorderFrame";
				ticketon.Dev = window.location.href.match(/dev\.*[a-zA-Z0-9.]ticketon\.kz/);
				ticketon.Consumer = window.location.hostname.replace(/^www\.(.*)$/, '$1').replace(/[^a-zA-Z0-9]/im, '_');
				var o = document.createElement("div");
				o.setAttribute("id", ticketon.OverlayID);
				o.innerHTML="";
				document.body.appendChild(o);
				var w = document.createElement("div");
				w.setAttribute("id", ticketon.WrapID);
				w.innerHTML="";
				var f = document.createElement("div");
				f.setAttribute("id", ticketon.FrameID);
				f.innerHTML="";
				w.appendChild(f);
				document.body.appendChild(w);
				ticketon.setWidgets();
				ticketon.setWindowResize();
				ticketon.CommandURL = ticketon.getBaseDomain();
				ticketon.ReturnURL = window.location.href;
				if (window.addEventListener){
					window.addEventListener("message", ticketon.messageDispatcher, false);
				} else {
					window.attachEvent("onmessage", ticketon.messageDispatcher);
				}
				if (window.location.hash.length) ticketon.loadHash(window.location.hash);
			} catch (e) {ticketon.errorLog(e)}
		},
		messageDispatcher:function(e) {
			if (e.origin.replace('http:', 'https:') !== ticketon.getBaseDomain()) {
				return;
			}
			ticketon.Exec().hash(e.data);
		},
		ping:function() {
			ticketon.messageDispatch("pong");
		},
		messageDispatch:function(e) {
			window.frames['frame_'+ticketon.FrameID].postMessage(e, ticketon.getBaseDomain());
		},
		errorLog:function (e, b, a) {
			if (e instanceof Error) {a=e.number;b=window.location.href;e=e.message}
			var c = "description=" + encodeURIComponent(e) + "&url=" + encodeURIComponent(b) + "&line=" + encodeURIComponent(a) + "&parentUrl=" + encodeURIComponent(document.location.href) + "&userAgent=" + encodeURIComponent(navigator.userAgent);
			new Image().src = ticketon.getBaseDomain() + "/errorlog?" + c
		},
		lang:function (i) {
			if (!!i) {
				ticketon.Lang = i;
				return ticketon;
			} else {
				return ticketon.Lang;
			}
		},
		transmit:function (i) {
			if (!!i) {
				ticketon.Transmit = i;
				return ticketon;
			} else {
				return ticketon.Transmit;
			}
		},
		init:function () {
			ticketon.LoadIV = setInterval(function() {
				if ( document.readyState === "loaded" || document.readyState === "interactive" || document.readyState === "complete" ) {
					setTimeout( ticketon.load, 1 );
					clearInterval(ticketon.LoadIV);
				}
			}, 100);
			return ticketon;
		},
		LoadIV:false
	};
	var ticketon = new Ticketon();
	ticketon.init();
	window.ticketon = ticketon;
})(window);
