/*! maska v3.0.0 by Alexander Shabunevich | Released under the MIT license */
(function(c,l){typeof exports=="object"&&typeof module<"u"?l(exports):typeof define=="function"&&define.amd?define(["exports"],l):(c=typeof globalThis<"u"?globalThis:c||self,l(c.Maska={}))})(this,function(c){"use strict";var j=Object.defineProperty;var x=(c,l,y)=>l in c?j(c,l,{enumerable:!0,configurable:!0,writable:!0,value:y}):c[l]=y;var E=(c,l,y)=>x(c,typeof l!="symbol"?l+"":l,y);const l={"#":{pattern:/[0-9]/},"@":{pattern:/[a-zA-Z]/},"*":{pattern:/[a-zA-Z0-9]/}},y=(n,s,e)=>n.replaceAll(s,"").replace(e,".").replace("..",".").replace(/[^.\d]/g,""),w=(n,s,e)=>{var t;return new Intl.NumberFormat(((t=e.number)==null?void 0:t.locale)??"en",{minimumFractionDigits:n,maximumFractionDigits:s,roundingMode:"trunc"})},C=(n,s=!0,e)=>{var A,N,v,g;const t=((A=e.number)==null?void 0:A.unsigned)==null&&n.startsWith("-")?"-":"",a=((N=e.number)==null?void 0:N.fraction)??0;let r=w(0,a,e);const p=r.formatToParts(1000.12),m=((v=p.find(o=>o.type==="group"))==null?void 0:v.value)??" ",k=((g=p.find(o=>o.type==="decimal"))==null?void 0:g.value)??".",i=y(n,m,k);if(i===""||Number.isNaN(i))return t;const f=i.split(".");if(f[1]!=null&&f[1].length>=1){const o=f[1].length<=a?f[1].length:a;r=w(o,a,e)}let h=r.format(parseFloat(i));return s?a>0&&i.endsWith(".")&&!i.slice(0,-1).includes(".")&&(h+=k):h=y(h,m,k),t+h};class P{constructor(s={}){E(this,"opts",{});E(this,"memo",new Map);const e={...s};if(e.tokens!=null){e.tokens=e.tokensReplace?{...e.tokens}:{...l,...e.tokens};for(const t of Object.values(e.tokens))typeof t.pattern=="string"&&(t.pattern=new RegExp(t.pattern))}else e.tokens=l;Array.isArray(e.mask)&&(e.mask.length>1?e.mask=[...e.mask].sort((t,a)=>t.length-a.length):e.mask=e.mask[0]??""),e.mask===""&&(e.mask=null),this.opts=e}masked(s){return this.process(s,this.findMask(s))}unmasked(s){return this.process(s,this.findMask(s),!1)}isEager(){return this.opts.eager===!0}isReversed(){return this.opts.reversed===!0}completed(s){const e=this.findMask(s);if(this.opts.mask==null||e==null)return!1;const t=this.process(s,e).length;return typeof this.opts.mask=="string"?t>=this.opts.mask.length:t>=e.length}findMask(s){const e=this.opts.mask;if(e==null)return null;if(typeof e=="string")return e;if(typeof e=="function")return e(s);const t=this.process(s,e.slice(-1).pop()??"",!1);return e.find(a=>this.process(s,a,!1).length>=t.length)??""}escapeMask(s){const e=[],t=[];return s.split("").forEach((a,r)=>{a==="!"&&s[r-1]!=="!"?t.push(r-t.length):e.push(a)}),{mask:e.join(""),escaped:t}}process(s,e,t=!0){if(this.opts.number!=null)return C(s,t,this.opts);if(e==null)return s;const a=`v=${s},mr=${e},m=${t?1:0}`;if(this.memo.has(a))return this.memo.get(a);const{mask:r,escaped:p}=this.escapeMask(e),m=[],k=this.opts.tokens!=null?this.opts.tokens:{},i=this.isReversed()?-1:1,f=this.isReversed()?"unshift":"push",h=this.isReversed()?0:r.length-1,A=this.isReversed()?()=>o>-1&&u>-1:()=>o<r.length&&u<s.length,N=M=>!this.isReversed()&&M<=h||this.isReversed()&&M>=h;let v,g=-1,o=this.isReversed()?r.length-1:0,u=this.isReversed()?s.length-1:0,I=!1;for(;A();){const M=r.charAt(o),d=k[M],R=(d==null?void 0:d.transform)!=null?d.transform(s.charAt(u)):s.charAt(u);if(!p.includes(o)&&d!=null?(R.match(d.pattern)!=null?(m[f](R),d.repeated?(g===-1?g=o:o===h&&o!==g&&(o=g-i),h===g&&(o-=i)):d.multiple&&(I=!0,o-=i),o+=i):d.multiple?I&&(o+=i,u-=i,I=!1):R===v?v=void 0:d.optional&&(o+=i,u-=i),u+=i):(t&&!this.isEager()&&m[f](M),R===M&&!this.isEager()?u+=i:v=M,this.isEager()||(o+=i)),this.isEager())for(;N(o)&&(k[r.charAt(o)]==null||p.includes(o));){if(t){if(m[f](r.charAt(o)),s.charAt(u)===r.charAt(o)){o+=i,u+=i;continue}}else r.charAt(o)===s.charAt(u)&&(u+=i);o+=i}}return this.memo.set(a,m.join("")),this.memo.get(a)}}const T=n=>JSON.parse(n.replaceAll("'",'"')),F=(n,s={})=>{const e={...s};n.dataset.maska!=null&&n.dataset.maska!==""&&(e.mask=S(n.dataset.maska)),n.dataset.maskaEager!=null&&(e.eager=b(n.dataset.maskaEager)),n.dataset.maskaReversed!=null&&(e.reversed=b(n.dataset.maskaReversed)),n.dataset.maskaTokensReplace!=null&&(e.tokensReplace=b(n.dataset.maskaTokensReplace)),n.dataset.maskaTokens!=null&&(e.tokens=O(n.dataset.maskaTokens));const t={};return n.dataset.maskaNumberLocale!=null&&(t.locale=n.dataset.maskaNumberLocale),n.dataset.maskaNumberFraction!=null&&(t.fraction=parseInt(n.dataset.maskaNumberFraction)),n.dataset.maskaNumberUnsigned!=null&&(t.unsigned=b(n.dataset.maskaNumberUnsigned)),(n.dataset.maskaNumber!=null||Object.values(t).length>0)&&(e.number=t),e},b=n=>n!==""?!!JSON.parse(n):!0,S=n=>n.startsWith("[")&&n.endsWith("]")?T(n):n,O=n=>{if(n.startsWith("{")&&n.endsWith("}"))return T(n);const s={};return n.split("|").forEach(e=>{const t=e.split(":");s[t[0]]={pattern:new RegExp(t[1]),optional:t[2]==="optional",multiple:t[2]==="multiple",repeated:t[2]==="repeated"}}),s};class W{constructor(s,e={}){E(this,"items",new Map);E(this,"onInput",s=>{if(s instanceof CustomEvent&&s.type==="input")return;const e=s.target,t=this.items.get(e),a="inputType"in s&&s.inputType.startsWith("delete"),r=t.isEager(),p=a&&r&&t.unmasked(e.value)===""?"":e.value;this.fixCursor(e,a,()=>this.setValue(e,p))});this.options=e,this.init(this.getInputs(s))}update(s={}){this.options={...s},this.init(Array.from(this.items.keys()))}updateValue(s){s.value!==""&&s.value!==this.processInput(s).masked&&this.setValue(s,s.value)}destroy(){for(const s of this.items.keys())s.removeEventListener("input",this.onInput);this.items.clear()}init(s){const e=this.getOptions(this.options);for(const t of s){this.items.has(t)||t.addEventListener("input",this.onInput,{capture:!0});const a=new P(F(t,e));this.items.set(t,a),queueMicrotask(()=>this.updateValue(t)),t.selectionStart===null&&a.isEager()&&console.warn("Maska: input of `%s` type is not supported",t.type)}}getInputs(s){return typeof s=="string"?Array.from(document.querySelectorAll(s)):"length"in s?Array.from(s):[s]}getOptions(s){const{onMaska:e,preProcess:t,postProcess:a,...r}=s;return r}fixCursor(s,e,t){const a=s.selectionStart,r=s.value;if(t(),a===null||a===r.length&&!e)return;const p=s.value,m=r.slice(0,a),k=p.slice(0,a),i=this.processInput(s,m).unmasked,f=this.processInput(s,k).unmasked;let h=a;m!==k&&(h+=e?p.length-r.length:i.length-f.length),s.setSelectionRange(h,h)}setValue(s,e){const t=this.processInput(s,e);s.value=t.masked,this.options.onMaska!=null&&(Array.isArray(this.options.onMaska)?this.options.onMaska.forEach(a=>a(t)):this.options.onMaska(t)),s.dispatchEvent(new CustomEvent("maska",{detail:t})),s.dispatchEvent(new CustomEvent("input",{detail:t.masked}))}processInput(s,e){const t=this.items.get(s);let a=e??s.value;this.options.preProcess!=null&&(a=this.options.preProcess(a));let r=t.masked(a);return this.options.postProcess!=null&&(r=this.options.postProcess(r)),{masked:r,unmasked:t.unmasked(a),completed:t.completed(a)}}}c.Mask=P,c.MaskInput=W,c.tokens=l,Object.defineProperty(c,Symbol.toStringTag,{value:"Module"})});
