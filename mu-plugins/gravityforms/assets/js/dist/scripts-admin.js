!function(){"use strict";var e,t,o,n={2987:function(e,t,o){o.r(t),o.d(t,{default:function(){return $}});var n,r=o(7329),a=o.n(r),l=o(7169),c=o(2577),i=o(5518),s=wp.blockEditor,m=wp.components,u=o(8349),d=o(1747),f=o(9662),g=o(1519),p=o.n(g),b=React.createElement("svg",{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 508.3 559.5",width:"100%",height:"100%",focusable:"false","aria-hidden":"true",className:"dashicon dashicon-gravityforms"},React.createElement("g",null,React.createElement("path",{className:"st0",d:"M468,109.8L294.4,9.6c-22.1-12.8-58.4-12.8-80.5,0L40.3,109.8C18.2,122.6,0,154,0,179.5V380\tc0,25.6,18.1,56.9,40.3,69.7l173.6,100.2c22.1,12.8,58.4,12.8,80.5,0L468,449.8c22.2-12.8,40.3-44.2,40.3-69.7V179.6\tC508.3,154,490.2,122.6,468,109.8z M399.3,244.4l-195.1,0c-11,0-19.2,3.2-25.6,10c-14.2,15.1-18.2,44.4-19.3,60.7H348v-26.4h49.9\tv76.3H111.3l-1.8-23c-0.3-3.3-5.9-80.7,32.8-121.9c16.1-17.1,37.1-25.8,62.4-25.8h194.7V244.4z"}))),v=o(2726),_=["label","colors","color","defaultColor","onChange"];function y(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,n)}return o}var h=(null===(n=window)||void 0===n?void 0:n.wp)||{},k=h.components,E=k.__experimentalHStack,C=k.__experimentalItemGroup,x=k.Button,R=k.ColorPalette,w=k.ColorIndicator,T=k.FlexItem,N=k.Dropdown,O=(Object.prototype.hasOwnProperty.call(h,"blockEditor")?h.blockEditor:h.editor).useSetting,P=h.element.useState,B=C,S=E;function j(e){var t,o=e.label,n=e.colors,r=void 0===n?[]:n,a=e.color,i=e.defaultColor,s=e.onChange,m=(0,v.Z)(e,_),d=P(a),f=(0,c.Z)(d,2),g=f[0],p=f[1],b=O("color.palette.theme"),h=O("color.palette.custom"),k=O("color.palette.default"),E=O("color.defaultPalette"),C=function(){var e=[];return r.length&&e.push({name:"Orbital",colors:r}),h&&h.length&&e.push({name:"Custom Colors",colors:h}),b&&b.length&&e.push({name:"Theme Colors",colors:b}),E&&k&&k.length&&e.push({name:"Default Colors",colors:k}),e}(),j={colorValue:g,toggleLabel:o},L={className:(0,u.classnames)({"block-editor-panel-color-gradient-settings__item-group":!0}),isBordered:!0,isSeparated:!0},I=function(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?y(Object(o),!0).forEach((function(t){(0,l.Z)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):y(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}({popoverProps:{placement:"left-end",position:"bottom left",className:(0,u.classnames)({"block-editor-panel-color-gradient-settings__dropdown-content":!0})},className:(0,u.classnames)({"block-editor-panel-color-gradient-settings__dropdown":!0}),renderToggle:(t=j,function(e){var o=e.onToggle,n=e.isOpen,r=t.colorValue,a=t.toggleLabel,l={onClick:o,className:(0,u.classnames)("block-editor-panel-color-gradient-settings__dropdown",{"is-open":n}),"aria-expanded":n};return React.createElement(x,l,function(e){var t=e.colorValue,o=e.indicatorLabel,n={justify:"flex-start"},r={className:(0,u.classnames)({"block-editor-panel-color-gradient-settings__color-indicator":!0}),colorValue:t},a={className:(0,u.classnames)({"block-editor-panel-color-gradient-settings__color-name":!0,title:o})};return React.createElement(S,n,React.createElement(w,r),React.createElement(T,a,o))}({colorValue:r,indicatorLabel:a}))}),renderContent:function(){var e={className:(0,u.classnames)({"block-editor-panel-color-gradient-settings__dropdown-content":!0})},t={colors:C,value:g,onChange:function(e){var t=!e&&i?i:e;p(t),s(t)},__experimentalHasMultipleOrigins:!0};return React.createElement("div",e,React.createElement(R,t))}},m);return React.createElement(B,L,React.createElement(N,I))}function L(e,t){var o=Object.keys(e);if(Object.getOwnPropertySymbols){var n=Object.getOwnPropertySymbols(e);t&&(n=n.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),o.push.apply(o,n)}return o}function I(e){for(var t=1;t<arguments.length;t++){var o=null!=arguments[t]?arguments[t]:{};t%2?L(Object(o),!0).forEach((function(t){(0,l.Z)(e,t,o[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(o)):L(Object(o)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(o,t))}))}return e}var F=wp.url.addQueryArgs,D=m.__experimentalHeading,z=m.__experimentalText,A=m.__experimentalSpacer,M=(null===a()||void 0===a()?void 0:a()["gravityforms/form"])||{},H=function(e){var t=e.attributes,o=e.setAttributes,n=(0,d.useState)(t.formId),r=(0,c.Z)(n,2),a=r[0],l=r[1],g=(0,d.useState)(!1),v=(0,c.Z)(g,2),_=v[0],y=v[1],h=(0,d.useState)(t.formPreview),k=(0,c.Z)(h,2),E=k[0],C=k[1],x=(0,d.useState)(t.title),R=(0,c.Z)(x,2),w=R[0],T=R[1],N=(0,d.useState)(t.description),O=(0,c.Z)(N,2),P=O[0],B=O[1],S=(0,d.useState)(t.ajax),L=(0,c.Z)(S,2),H=L[0],G=L[1];(0,d.useLayoutEffect)((function(){if(!a&&(0,i.queryToJson)().gfAddBlock){var e=(0,i.queryToJson)().gfAddBlock;o({formId:e}),l(e)}}),[]),(0,d.useLayoutEffect)((function(){if(a){if(!V(a))return o({formId:""}),void y(!0);o({formId:a}),C(!0)}else o({formId:""})}),[a]),(0,d.useEffect)((function(){o({formPreview:E}),o({title:w}),o({description:P}),o({ajax:H})}),[E,w,P,H]);var V=function(e){return M.data.forms.find((function(t){return t.id==e}))},Z=function(){for(var e=[{label:(0,f.__)("Select a Form","gravityforms"),value:""}],t=0;t<M.data.forms.length;t++){var o=M.data.forms[t];e.push({label:o.title,value:o.id})}return e},$=function(e,t){e.preventDefault();var o=F(M.data.adminURL,t);window.open(o,"_blank","noopener")},q=function(e){var t,n,r;if("gform/dialog/confirm"===e.type&&(null==e||null===(t=e.detail)||void 0===t||null===(n=t.instance)||void 0===n||null===(r=n.options)||void 0===r?void 0:r.id)==="restore-default-settings-dialog-"+a){var l=I(I({},M.data.styles.defaults),{},{theme:"orbital"});o(l)}},J=function(){if(!a)return null;var e={page:"gf_edit_forms",id:a},t={page:"gf_edit_forms",id:a,view:"settings"},o={key:"gform-block-custom-controls"},n={key:"gform-block-edit-form-buttton",onClick:function(t){$(t,e)},className:(0,u.classnames)({"gform-block__toolbar-button":!0})},r={text:(0,f.__)("Edit Form","gravityforms")},l={className:(0,u.classnames)({"gform-icon":!0,"gform-icon--create":!0})},c={key:"gform-block-form-settings-button",onClick:function(e){$(e,t)},className:(0,u.classnames)({"gform-block__toolbar-button":!0})},i={text:(0,f.__)("Form Settings","gravityforms")},d={className:(0,u.classnames)({"gform-icon":!0,"gform-icon--cog":!0})};return React.createElement(s.BlockControls,o,React.createElement(m.ToolbarButton,n,React.createElement(m.Tooltip,r,React.createElement("i",l))),React.createElement(m.ToolbarButton,c,React.createElement(m.Tooltip,i,React.createElement("i",d))))},U=function(){if(document.addEventListener("gform/dialog/confirm",q),!M.data.forms||M.data.forms.length<=0)return null;var e=M.data.styles.defaults,t={key:"inspector"},n={title:(0,f.__)("Form Settings","gravityforms")},r={label:(0,f.__)("Form","gravityforms"),value:a,options:Z(),onChange:function(e){return l(e)}},c={label:(0,f.__)("Form Title","gravityforms"),checked:w,onChange:function(){return T(!w)}},g={label:(0,f.__)("Form Description","gravityforms"),checked:P,onChange:function(){return B(!P)}},b={title:(0,f.__)("Form Styles","gravityforms"),initialOpen:!1,className:(0,u.classnames)({"gform-block__panel":!0,"gform-block__form-styles":!0})},v={label:(0,f.__)("Form Theme","gravityforms"),value:X,options:[{label:(0,f.__)("Default","gravityforms"),value:"gravity"},{label:(0,f.__)("Orbital","gravityforms"),value:"orbital"}],className:(0,u.classnames)({"gform-block__theme-selector":!0}),onChange:function(e){return o({theme:e})}},_={variant:"primary",text:(0,f.__)("Reset Defaults","gravityforms"),className:(0,u.classnames)({"gform-block__theme-reset-defaults":!0}),onClick:function(e){!function(e,t){var o="restore-default-settings-dialog-"+t;new(p())({confirmButtonText:(0,f.__)("Restore Defaults","gravityforms"),content:(0,f.__)("This will restore your form styles back to their default values and cannot be undone. Are you sure you want to continue?","gravityforms"),cancelButtonText:(0,f.__)("Cancel","gravityforms"),closeButtonTitle:(0,f.__)("Close","gravityforms"),id:o,maskBlur:!1,maskTheme:"none",mode:"dialog",onClose:function(){!function(e){var t=document.getElementById(e);if(t){var o=t.closest(".gform-dialog__mask");o&&o.remove()}}(o)},title:(0,f.__)("Restore Default Styles","gravityforms"),titleIconColor:"#DD301D",zIndex:100055}).showDialog()}(0,a)}},y={className:(0,u.classnames)({"gform-alert":!0,"gform-alert--notice":!0,"gform-alert--theme-primary":!0,"gform-alert--inline":!0})},h={ariaHidden:!0,className:(0,u.classnames)({"gform-alert__icon":!0,"gform-icon":!0,"gform-icon--circle-notice-fine":!0})},k={className:(0,u.classnames)({"gform-alert__message-wrap":!0})},x={className:(0,u.classnames)({"gform-alert__message":!0}),dangerouslySetInnerHTML:{__html:(0,i.sprintf)((0,f.__)("Form style options are not available for forms that use %1$slegacy mode%2$s.","gravityforms"),'<a target="_blank" href="'.concat(M.data.adminURL,"?page=gf_edit_forms&view=settings&subview=settings&id=").concat(a,'">'),"</a>")}},R={title:(0,f.__)("Input Styles","gravityforms"),initialOpen:!1,className:(0,u.classnames)({"gform-block__panel":!0})},N={align:"flex-start",className:(0,u.classnames)({"gform-block__components-flex--adjust-gap":!0}),gap:0},O={className:(0,u.classnames)({"gform-block__components-base-control--adjust-label-line-height":!0}),label:(0,f.__)("Size","gravityforms"),value:Y,options:[{label:(0,f.__)("Small","gravityforms"),value:"sm"},{label:(0,f.__)("Medium","gravityforms"),value:"md"},{label:(0,f.__)("Large","gravityforms"),value:"lg"}],onChange:function(e){return o({inputSize:e})}},S={className:(0,u.classnames)({"gform-block__components-base-control--adjust-label-line-height":!0}),label:(0,f.__)("Border Radius","gravityforms"),help:(0,f.__)("In pixels.","gravityforms"),value:K,type:"number",onChange:function(e){return o({inputBorderRadius:e})}},L={level:3},I={label:(0,f.__)("Background","gravityforms"),color:te,defaultColor:e.inputBackgroundColor,onChange:function(e){return o({inputBackgroundColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__first-child-palette":!0})},F={label:(0,f.__)("Border","gravityforms"),color:ee,defaultColor:e.inputBorderColor,onChange:function(e){return o({inputBorderColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__middle-child-palette":!0})},$={label:(0,f.__)("Text","gravityforms"),color:oe,defaultColor:e.inputColor,onChange:function(e){return o({inputColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__last-child-palette":!0})},J={marginTop:2},U={backgroundColor:te,textColor:oe},se={title:(0,f.__)("Label Styles","gravityforms"),initialOpen:!1,className:(0,u.classnames)({"gform-block__panel":!0})},me={label:(0,f.__)("Font Size","gravityforms"),help:(0,f.__)("In pixels.","gravityforms"),value:ne,type:"number",onChange:function(e){return o({labelFontSize:e})}},ue={level:3},de={label:(0,f.__)("Text","gravityforms"),color:re,defaultColor:e.labelColor,onChange:function(e){return o({labelColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__first-child-palette":!0,"gform-block-editor-panel__last-child-palette":!0})},fe={title:(0,f.__)("Description Styles","gravityforms"),initialOpen:!1,className:(0,u.classnames)({"gform-block__panel":!0})},ge={label:(0,f.__)("Font Size","gravityforms"),help:(0,f.__)("In pixels.","gravityforms"),value:ae,type:"number",onChange:function(e){return o({descriptionFontSize:e})}},pe={level:3},be={label:(0,f.__)("Text","gravityforms"),color:le,defaultColor:e.descriptionColor,onChange:function(e){return o({descriptionColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__first-child-palette":!0,"gform-block-editor-panel__last-child-palette":!0})},ve={title:(0,f.__)("Button Styles","gravityforms"),initialOpen:!1,className:(0,u.classnames)({"gform-block__panel":!0})},_e={level:3},ye={label:(0,f.__)("Background","gravityforms"),color:ce,defaultColor:e.buttonPrimaryBackgroundColor,onChange:function(e){return o({buttonPrimaryBackgroundColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__first-child-palette":!0})},he={label:(0,f.__)("Text","gravityforms"),color:ie,defaultColor:e.buttonPrimaryColor,onChange:function(e){return o({buttonPrimaryColor:e})},className:(0,u.classnames)({"gform-block-editor-panel__last-child-palette":!0})},ke={marginTop:2},Ee={variant:"muted",size:"subheadline"},Ce={backgroundColor:ce,textColor:ie},xe={title:(0,f.__)("Advanced","gravityforms"),initialOpen:!1,className:(0,u.classnames)({"gform-block__panel":!0})},Re={label:(0,f.__)("Preview","gravityforms"),checked:E,onChange:function(){return C(!E)}},we={label:(0,f.__)("AJAX","gravityforms"),checked:H,onChange:function(){return G(!H)}},Te={label:(0,f.__)("Field Values","gravityforms"),value:W,onChange:function(e){return o({fieldValues:e})}},Ne={className:(0,u.classnames)({"gform-block__tabindex":!0}),label:(0,f.__)("Tabindex","gravityforms"),type:"number",value:Q,onChange:function(e){return o({tabindex:e})},placeholder:"-1"};return React.createElement(s.InspectorControls,t,React.createElement(m.PanelBody,n,React.createElement(m.SelectControl,r),V(a)&&React.createElement(d.Fragment,null,React.createElement(m.ToggleControl,c),React.createElement(m.ToggleControl,g))),React.createElement(m.PanelBody,b,V(a)&&!V(a).isLegacyMarkup&&React.createElement(m.SelectControl,v),V(a)&&!V(a).isLegacyMarkup&&"orbital"===X&&React.createElement(m.Button,_),V(a)&&V(a).isLegacyMarkup&&React.createElement("div",y,React.createElement("span",h),React.createElement("div",k,React.createElement("p",x)))),"orbital"===X&&V(a)&&!V(a).isLegacyMarkup&&React.createElement(m.PanelBody,R,React.createElement(m.Flex,N,React.createElement(m.FlexBlock,null,React.createElement(m.SelectControl,O)),React.createElement(m.FlexBlock,null,React.createElement(m.TextControl,S))),React.createElement(D,L,(0,f.__)("Colors","gravityforms")),React.createElement(j,I),React.createElement(j,F),React.createElement(j,$),React.createElement(A,J,React.createElement(s.ContrastChecker,U))),"orbital"===X&&V(a)&&!V(a).isLegacyMarkup&&React.createElement(m.PanelBody,se,React.createElement(m.TextControl,me),React.createElement(D,ue,(0,f.__)("Colors","gravityforms")),React.createElement(j,de)),"orbital"===X&&V(a)&&!V(a).isLegacyMarkup&&React.createElement(m.PanelBody,fe,React.createElement(m.TextControl,ge),React.createElement(D,pe,(0,f.__)("Colors","gravityforms")),React.createElement(j,be)),"orbital"===X&&V(a)&&!V(a).isLegacyMarkup&&React.createElement(m.PanelBody,ve,React.createElement(D,_e,(0,f.__)("Colors","gravityforms")),React.createElement(j,ye),React.createElement(j,he),React.createElement(A,ke,React.createElement(z,Ee,(0,f.__)("Also used for form UI elements such as checkbox and radio.","gravityforms"))),React.createElement(A,ke,React.createElement(s.ContrastChecker,Ce))),a&&React.createElement(m.PanelBody,xe,V(a)&&React.createElement(m.ToggleControl,Re),React.createElement(m.ToggleControl,we),React.createElement(m.TextareaControl,Te),React.createElement(m.TextControl,Ne),React.createElement(d.Fragment,null,(0,i.sprintf)((0,f.__)("Form ID: %s","gravityforms"),a))))},Q=t.tabindex,W=t.fieldValues,X=(t.imgPreview,t.theme),Y=t.inputSize,K=t.inputBorderRadius,ee=t.inputBorderColor,te=t.inputBackgroundColor,oe=t.inputColor,ne=t.labelFontSize,re=t.labelColor,ae=t.descriptionFontSize,le=t.descriptionColor,ce=t.buttonPrimaryBackgroundColor,ie=t.buttonPrimaryColor,se={className:(0,u.classnames)({"gform-block__alert":!0,"gform-block__alert-error":!0})},me={key:"placeholder",className:(0,u.classnames)({"wp-block-embed":!0,"gform-block__placeholder":!0})},ue={className:(0,u.classnames)({"gform-block__placeholder-brand":!0})},de={className:(0,u.classnames)({"gform-icon":!0})},fe={value:a,onChange:function(e){return l(e.target.value)}};if(!t.formId||!E)return React.createElement("div",(0,s.useBlockProps)(),J(),U(),_&&React.createElement("div",se,React.createElement("p",null,(0,f.__)("The selected form has been deleted or trashed. Please select a new form.","gravityforms"))),React.createElement(m.Placeholder,me,React.createElement("div",ue,React.createElement("div",de,b),React.createElement("p",null,React.createElement("strong",null,(0,f.__)("Gravity Forms","gravityforms")))),M.data.forms&&M.data.forms.length>0&&React.createElement("form",null,React.createElement("select",fe,Z().map((function(e){return React.createElement("option",{key:e.value,value:e.value},e.label)})))),(!M.data.forms||M.data.forms&&0===M.data.forms.length)&&React.createElement("form",null,React.createElement("p",null,(0,f.__)("You must have at least one form to use the block.","gravityforms")))));var ge={key:"form_preview",block:"gravityforms/form",attributes:t};return React.createElement("div",(0,s.useBlockProps)(),J(),U(),React.createElement(m.ServerSideRender,ge))},G=wp.i18n.__,V=wp.blocks.registerBlockType,Z=(null===a()||void 0===a()?void 0:a()["gravityforms/form"])||{},$=function(){var e;(0,i.consoleInfo)("Gravity Forms Admin: Initialized form block."),V("gravityforms/form",{title:G("Gravity Forms","gravityforms"),description:G("Select and display one of your forms.","gravityforms"),category:"embed",supports:{customClassName:!1,className:!1,html:!1},keywords:["gravity forms","form","newsletter","contact"],example:{attributes:{imgPreview:!0}},attributes:(null==Z||null===(e=Z.data)||void 0===e?void 0:e.attributes)||{},icon:b,transforms:{from:[{type:"shortcode",tag:["gravityform","gravityforms"],attributes:{formId:{type:"string",shortcode:function(e){var t=e.named.id;return parseInt(t).toString()}},title:{type:"boolean",shortcode:function(e){return"true"===e.named.title}},description:{type:"boolean",shortcode:function(e){return"true"===e.named.description}},ajax:{type:"boolean",shortcode:function(e){return"true"===e.named.ajax}},tabindex:{type:"string",shortcode:function(e){var t=e.named.tabindex;return isNaN(t)?null:parseInt(t).toString()}}}}]},edit:H,save:function(){return null}})}},4498:function(e,t,o){var n,r,a,l,c=o(5518),i=function(){(0,c.consoleInfo)("Gravity Forms Common: Initialized all javascript that targeted document ready.")},s=function(){(0,c.ready)(i)},m=o(5311),u=o.n(m),d=o(2340),f=o.n(d),g=o(7329),p=o.n(g),b=gform.components.admin.html.elements.Loader,v=o.n(b),_={containers:(0,c.getNodes)("page-loader",!0)},y={rendered:!1},h=(null===p()||void 0===p()||null===(n=p().form_settings)||void 0===n?void 0:n.loader)||{},k=function(){f().instances.loaders.pageLoader.hideLoader()},E=function(){y.rendered?f().instances.loaders.pageLoader.showLoader():(f().instances.loaders.pageLoader.init(),y.rendered=!0)},C=o(11),x={closeTrigger:null,container:null,target:null},R={hideTimer:function(){},hideAnimationTimer:function(){}},w={attributes:{},autoHide:!0,autoHideDelay:4e3,closeButton:!0,closeTitle:"",container:"",ctaLink:"",ctaTarget:"_self",ctaText:"",icon:"",message:"",onClose:function(){},onReveal:function(){},position:"bottomleft",speak:!0,type:"normal",wrapperClasses:"gform-snackbar"},T={},N=function(){x.container&&(x.target.style.position="",x.container.parentNode.removeChild(x.container),x.closeTrigger&&x.closeTrigger.removeEventListener("click",O),clearTimeout(R.hideTimer),clearTimeout(R.hideAnimationTimer),x.container=null,x.closeTrigger=null,x.target=null)},O=function(){x.container.classList.remove("gform-snackbar--reveal"),R.hideAnimationTimer=setTimeout((function(){(0,c.trigger)({event:"gform/snackbar/close",native:!1,data:{el:x,options:T,state:R}}),N()}),300)},P=function(e){N(),function(){var e=arguments.length>0&&void 0!==arguments[0]?arguments[0]:{};T=(0,C.Z)({},w,e),(0,c.trigger)({event:"gform/snackbar/pre_init",native:!1,data:T})}(e),x.target=(0,c.getNodes)(T.container,!1,document,!0)[0],x.target||(0,c.consoleError)("Gform snackBar couldn't find ".concat(T.container," to instantiate in.")),x.target.style.position="relative",x.target.insertAdjacentHTML("beforeend",'\n\t<article\n\t\tclass="'.concat(T.wrapperClasses," gform-snackbar--").concat(T.position," gform-snackbar--").concat(T.type).concat(T.closeButton?" gform-snackbar--has-close":"",'" \n\t\tdata-js="gform-snackbar"\n\t>\n\t\t').concat(T.icon?'<span class="gform-snackbar__icon gform-icon gform-icon--'.concat(T.icon,'"></span>'):"","\n\t\t").concat(T.message?'<span class="gform-snackbar__message">'.concat(T.message,"</span>"):"","\n\t\t").concat(T.ctaLink?'\n\t\t<a \n\t\t\tclass="gform-snackbar__cta"\n\t\t\thref="'.concat(T.ctaLink,'"\n\t\t\ttarget="').concat(T.ctaTarget,'"\n\t\t\t').concat("_blank"===T.ctaTarget?'rel="noopener"':"","\n\t\t>\n\t\t\t").concat(T.ctaText,"\n\t\t</a>\n\t\t"):"","\n\t\t").concat(T.closeButton?'\n\t\t<button \n\t\t\tclass="gform-snackbar__close gform-icon gform-icon--delete"\n\t\t\tdata-js="gform-snackbar-close"\n\t\t\ttitle="'.concat(T.closeTitle,'"\n\t\t></button>\n\t\t'):"","\n\t</article>\n")),x.container=(0,c.getNodes)("gform-snackbar",!1,x.target)[0],x.closeTrigger=(0,c.getNodes)("gform-snackbar-close",!1,x.target)[0],(0,c.setAttributes)(x.container,T.attributes),(0,c.trigger)({event:"gform/snackbar/pre_reveal",native:!1,data:{el:x,options:T,state:R}}),setTimeout((function(){x.container.classList.add("gform-snackbar--reveal"),T.autoHide&&(R.hideTimer=setTimeout((function(){O()}),T.autoHideDelay)),T.speak&&(0,c.speak)(T.message),T.onReveal()}),20),x.closeTrigger&&x.closeTrigger.addEventListener("click",O)},B=function(e){P(e.detail)},S={embedForm:(0,c.getNode)("embed-flyout-trigger"),taggable:(0,c.getNode)(".merge-tag-support",document,!0),postSelect:(0,c.getNodes)("gform-settings-field-select",!0)},j=function(){var e;f().instances=f().instances||{},f().instances.loaders=f().instances.loaders||{},e=h.i18n.loaderText,f().instances.loaders.pageLoader=new(v())({id:"gform-page-loader",position:"sticky",renderOnInit:!1,target:"#wpbody-content",text:(0,c.escapeHtml)(e)}),_.containers.forEach((function(e){"form"===e.tagName.toLowerCase()&&u()(e).on("submit",E)})),document.addEventListener("gform/page_loader/show",E),document.addEventListener("gform/page_loader/hide",k),(0,c.consoleInfo)("Gravity Forms Admin: Initialized page loader."),document.addEventListener("gform/snackbar/render",B),(0,c.consoleInfo)("Gravity Forms Admin: Initialized snackbar component."),S.embedForm&&Promise.all([o.e(194),o.e(848)]).then(o.bind(o,5477)).then((function(e){e.default()})),S.taggable&&Promise.all([o.e(194),o.e(514)]).then(o.bind(o,8579)).then((function(e){e.default()})),S.postSelect.length&&o.e(376).then(o.bind(o,929)).then((function(e){e.default(S.postSelect)})),(0,c.consoleInfo)("Gravity Forms Admin: Initialized all admin components.")},L=(null===p()||void 0===p()||null===(r=p().components)||void 0===r||null===(a=r.setup_wizard)||void 0===a||null===(l=a.data)||void 0===l?void 0:l.shouldDisplay)||!1,I={templateLibrary:(0,c.getNode)("gf-template-library")},F=(null===p()||void 0===p()?void 0:p().block_editor)||{},D={formEditor:(0,c.getNodes)("form-editor-wrapper")[0],formSettings:(0,c.getNodes)("form-settings")[0],splashPageModal:(0,c.getNodes)("gf-splash-template")[0],systemReportButton:(0,c.getNodes)("gf-copy-system-report")[0]},z=function(){s(),j(),I.templateLibrary&&Promise.all([o.e(194),o.e(954),o.e(581),o.e(236)]).then(o.bind(o,5675)).then((function(e){e.default(I.templateLibrary)})),L&&(document.getElementById("wpbody-content").insertAdjacentHTML("afterbegin",'<div data-js="setup-wizard"></div>'),I.setupWizard=(0,c.getNode)("setup-wizard"),Promise.all([o.e(194),o.e(954),o.e(581),o.e(215)]).then(o.bind(o,112)).then((function(e){e.default(I.setupWizard)}))),(0,c.consoleInfo)("Gravity Forms Admin: Initialized all apps."),F.data.is_block_editor&&o.e(319).then(o.bind(o,5456)).then((function(e){e.default()})),D.formEditor&&Promise.all([o.e(194),o.e(954),o.e(355),o.e(42)]).then(o.bind(o,9103)).then((function(e){e.default(D.formEditor)})),!D.formEditor&&(0,c.shouldLoadChunk)("form-saver")&&Promise.all([o.e(194),o.e(954),o.e(355),o.e(646)]).then(o.bind(o,6878)).then((function(e){e.default()})),D.splashPageModal&&o.e(993).then(o.bind(o,5472)).then((function(e){e.default(D.splashPageModal)})),D.systemReportButton&&o.e(736).then(o.bind(o,9792)).then((function(e){e.default(D.systemReportButton)})),(0,c.consoleInfo)("Gravity Forms Admin: Initialized all javascript that targeted document ready.")},A=(null===p()||void 0===p()?void 0:p().block_editor)||{};p().hmr_dev||(o.p=p().public_path),A.data.is_block_editor&&o(2987).default(),(0,c.ready)(z)},9608:function(e){e.exports=ajaxurl},7536:function(e){e.exports=gf_vars},2340:function(e){e.exports=gform},8361:function(e){e.exports=gform.components.admin.html.apps.EmbedForm},3068:function(e){e.exports=gform.components.admin.html.elements.Button},191:function(e){e.exports=gform.components.admin.html.elements.Dropdown},1519:function(e){e.exports=gform.components.admin.html.modules.Dialog},5862:function(e){e.exports=gform.components.admin.html.modules.Flyout},5872:function(e){e.exports=gform.components.admin.react.elements.Box},564:function(e){e.exports=gform.components.admin.react.elements.Button},4065:function(e){e.exports=gform.components.admin.react.elements.Checkbox},351:function(e){e.exports=gform.components.admin.react.elements.Grid},4216:function(e){e.exports=gform.components.admin.react.elements.Heading},5718:function(e){e.exports=gform.components.admin.react.elements.Icon},4824:function(e){e.exports=gform.components.admin.react.elements.Input},5211:function(e){e.exports=gform.components.admin.react.elements.Label},9645:function(e){e.exports=gform.components.admin.react.elements.Select},405:function(e){e.exports=gform.components.admin.react.elements.Tag},6172:function(e){e.exports=gform.components.admin.react.elements.Text},5235:function(e){e.exports=gform.components.admin.react.elements.Textarea},5595:function(e){e.exports=gform.components.admin.react.elements.Toggle},7539:function(e){e.exports=gform.components.admin.react.modules.Card},9843:function(e){e.exports=gform.components.admin.react.modules.Dialog},89:function(e){e.exports=gform.components.admin.react.modules.Flyout},8309:function(e){e.exports=gform.components.admin.react.modules.InputGroup},8472:function(e){e.exports=gform.components.admin.react.modules.List},4318:function(e){e.exports=gform.components.admin.react.modules.NavBar},4819:function(e){e.exports=gform.components.admin.react.modules.Video},8349:function(e){e.exports=gform.libraries},5518:function(e){e.exports=gform.utils},6134:function(e){e.exports=gform.utils.react},7329:function(e){e.exports=gform_admin_config},5311:function(e){e.exports=jQuery},5998:function(e){e.exports=wp},4489:function(e){e.exports=wp.data},6132:function(e){e.exports=wp.editPost},1747:function(e){e.exports=wp.element},9662:function(e){e.exports=wp.i18n},9841:function(e){e.exports=wp.plugins}},r={};function a(e){var t=r[e];if(void 0!==t)return t.exports;var o=r[e]={exports:{}};return n[e](o,o.exports,a),o.exports}a.m=n,e=[],a.O=function(t,o,n,r){if(!o){var l=1/0;for(m=0;m<e.length;m++){o=e[m][0],n=e[m][1],r=e[m][2];for(var c=!0,i=0;i<o.length;i++)(!1&r||l>=r)&&Object.keys(a.O).every((function(e){return a.O[e](o[i])}))?o.splice(i--,1):(c=!1,r<l&&(l=r));if(c){e.splice(m--,1);var s=n();void 0!==s&&(t=s)}}return t}r=r||0;for(var m=e.length;m>0&&e[m-1][2]>r;m--)e[m]=e[m-1];e[m]=[o,n,r]},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,{a:t}),t},a.d=function(e,t){for(var o in t)a.o(t,o)&&!a.o(e,o)&&Object.defineProperty(e,o,{enumerable:!0,get:t[o]})},a.f={},a.e=function(e){return Promise.all(Object.keys(a.f).reduce((function(t,o){return a.f[o](e,t),t}),[]))},a.u=function(e){return({42:"scripts-admin.form-editor",215:"scripts-admin.setup-wizard",236:"scripts-admin.template-library",319:"scripts-admin.block-editor",376:"scripts-admin.post-select",514:"scripts-admin.merge-tags",646:"scripts-admin.form-ajax-save",736:"scripts-admin.system-report",848:"scripts-admin.embed-form",993:"scripts-admin.splash-page"}[e]||e)+"."+{42:"cf06c702f5899c34be10",215:"7153d985d3cafac5fb8e",236:"b54671418dbbde2c24ad",319:"150af96c7dc6c93ba043",355:"208686d31b904e61799f",376:"1273f0be5ce14985993d",514:"39c85c05c7ce6cc1f34c",581:"35c1ee490923acba36ee",646:"1102c053975306c2c1f6",736:"37805646f3f73f26d5b5",848:"85d99ceb22ee8a9914b1",954:"9b69eab2b016af6f59c3",993:"f8c0bd6bd203e95226d0"}[e]+".js"},a.g=function(){if("object"==typeof globalThis)return globalThis;try{return this||new Function("return this")()}catch(e){if("object"==typeof window)return window}}(),a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},t={},o="gravityforms:",a.l=function(e,n,r,l){if(t[e])t[e].push(n);else{var c,i;if(void 0!==r)for(var s=document.getElementsByTagName("script"),m=0;m<s.length;m++){var u=s[m];if(u.getAttribute("src")==e||u.getAttribute("data-webpack")==o+r){c=u;break}}c||(i=!0,(c=document.createElement("script")).charset="utf-8",c.timeout=120,a.nc&&c.setAttribute("nonce",a.nc),c.setAttribute("data-webpack",o+r),c.src=e),t[e]=[n];var d=function(o,n){c.onerror=c.onload=null,clearTimeout(f);var r=t[e];if(delete t[e],c.parentNode&&c.parentNode.removeChild(c),r&&r.forEach((function(e){return e(n)})),o)return o(n)},f=setTimeout(d.bind(null,void 0,{type:"timeout",target:c}),12e4);c.onerror=d.bind(null,c.onerror),c.onload=d.bind(null,c.onload),i&&document.head.appendChild(c)}},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},function(){var e;a.g.importScripts&&(e=a.g.location+"");var t=a.g.document;if(!e&&t&&(t.currentScript&&(e=t.currentScript.src),!e)){var o=t.getElementsByTagName("script");o.length&&(e=o[o.length-1].src)}if(!e)throw new Error("Automatic publicPath is not supported in this browser");e=e.replace(/#.*$/,"").replace(/\?.*$/,"").replace(/\/[^\/]+$/,"/"),a.p=e}(),function(){var e={223:0};a.f.j=function(t,o){var n=a.o(e,t)?e[t]:void 0;if(0!==n)if(n)o.push(n[2]);else{var r=new Promise((function(o,r){n=e[t]=[o,r]}));o.push(n[2]=r);var l=a.p+a.u(t),c=new Error;a.l(l,(function(o){if(a.o(e,t)&&(0!==(n=e[t])&&(e[t]=void 0),n)){var r=o&&("load"===o.type?"missing":o.type),l=o&&o.target&&o.target.src;c.message="Loading chunk "+t+" failed.\n("+r+": "+l+")",c.name="ChunkLoadError",c.type=r,c.request=l,n[1](c)}}),"chunk-"+t,t)}},a.O.j=function(t){return 0===e[t]};var t=function(t,o){var n,r,l=o[0],c=o[1],i=o[2],s=0;if(l.some((function(t){return 0!==e[t]}))){for(n in c)a.o(c,n)&&(a.m[n]=c[n]);if(i)var m=i(a)}for(t&&t(o);s<l.length;s++)r=l[s],a.o(e,r)&&e[r]&&e[r][0](),e[r]=0;return a.O(m)},o=self.webpackChunkgravityforms=self.webpackChunkgravityforms||[];o.forEach(t.bind(null,0)),o.push=t.bind(null,o.push.bind(o))}(),a.O(void 0,[194],(function(){return a(8868)}));var l=a.O(void 0,[194],(function(){return a(4498)}));l=a.O(l)}();
//# sourceMappingURL=scripts-admin.js.map