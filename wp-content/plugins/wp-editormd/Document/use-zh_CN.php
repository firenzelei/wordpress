<?php
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>WP Editor.md使用文档</title>
    <style>
     @font-face {
	font-family: octicons-anchor;
            src: url(data:font/woff;charset=utf-8;base64,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) format('woff');
        }

        body {
	background-color: white;
        }

        .markdown-body {
	min-width: 200px;
            max-width: 760px;
            margin: 0 auto;
            padding: 20px;

            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
            color: #333;
            overflow: hidden;
            font-family: "Helvetica Neue", Helvetica, "Segoe UI", Arial, freesans, sans-serif;
            font-size: 16px;
            line-height: 1.6;
            word-wrap: break-word;
        }

        .markdown-body a {
	background: transparent;;
	word-wrap: break-word;
            word-break: break-all;
        }

        .markdown-body a:active,
        .markdown-body a:hover {
	outline: 0;
}

        .markdown-body strong {
	font-weight: bold;
        }

        .markdown-body h1 {
	font-size: 2em;
            margin: 0.67em 0;
        }

        .markdown-body img {
	border: 0;
}

        .markdown-body hr {
	-moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 0;
        }

        .markdown-body pre {
	overflow: auto;
}

        .markdown-body code,
        .markdown-body kbd,
        .markdown-body pre {
	font-family: monospace, monospace;
            font-size: 1em;
        }

        .markdown-body input {
	color: inherit;
	font: inherit;
	margin: 0;
}

        .markdown-body html input[disabled] {
	cursor: default;
}

        .markdown-body input {
	line-height: normal;
        }

        .markdown-body input[type="checkbox"] {
	-moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 0;
        }

        .markdown-body table {
	border-collapse: collapse;
            border-spacing: 0;
        }

        .markdown-body td,
        .markdown-body th {
	padding: 0;
}

        .markdown-body * {
	-moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .markdown-body input {
	font: 13px/1.4 Helvetica, arial, freesans, clean, sans-serif, "Segoe UI Emoji", "Segoe UI Symbol";
        }

        .markdown-body a {
	color: #4183c4;
	text-decoration: none;
        }

        .markdown-body a:hover,
        .markdown-body a:focus,
        .markdown-body a:active {
	text-decoration: underline;
        }

        .markdown-body hr {
	height: 0;
	margin: 15px 0;
            overflow: hidden;
            background: transparent;
            border: 0;
            border-bottom: 1px solid #ddd;
        }

        .markdown-body hr:before {
	display: table;
	content: "";
}

        .markdown-body hr:after {
	display: table;
	clear: both;
	content: "";
}

        .markdown-body h1,
        .markdown-body h2,
        .markdown-body h3,
        .markdown-body h4,
        .markdown-body h5,
        .markdown-body h6 {
	margin-top: 15px;
            margin-bottom: 15px;
            line-height: 1.1;
        }

        .markdown-body h1 {
	font-size: 30px;
        }

        .markdown-body h2 {
	font-size: 21px;
        }

        .markdown-body h3 {
	font-size: 16px;
        }

        .markdown-body h4 {
	font-size: 14px;
        }

        .markdown-body h5 {
	font-size: 12px;
        }

        .markdown-body h6 {
	font-size: 11px;
        }

        .markdown-body blockquote {
	margin: 0;
}

        .markdown-body ul,
        .markdown-body ol {
	padding: 0;
	margin-top: 0;
            margin-bottom: 0;
        }

        .markdown-body ol ol,
        .markdown-body ul ol {
	list-style-type: lower-roman;
        }

        .markdown-body ul ul ol,
        .markdown-body ul ol ol,
        .markdown-body ol ul ol,
        .markdown-body ol ol ol {
	list-style-type: lower-alpha;
        }

        .markdown-body dd {
	margin-left: 0;
        }

        .markdown-body code {
	font: 12px Consolas, "Liberation Mono", Menlo, Courier, monospace;
        }

        .markdown-body pre {
	margin-top: 0;
            margin-bottom: 0;
            font: 12px Consolas, "Liberation Mono", Menlo, Courier, monospace;
        }

        .markdown-body kbd {
	background-color: #e7e7e7;
            background-image: -webkit-linear-gradient(#fefefe, #e7e7e7);
		background-image: linear-gradient(#fefefe, #e7e7e7);
		background-repeat: repeat-x;
            border-radius: 2px;
            border: 1px solid #cfcfcf;
            color: #000;
            padding: 3px 5px;
            line-height: 10px;
            font: 11px Consolas, "Liberation Mono", Menlo, Courier, monospace;
            display: inline-block;
        }

        .markdown-body > *:first-child {
	margin-top: 0 !important;
        }

        .markdown-body > *:last-child {
	margin-bottom: 0 !important;
        }

        .markdown-body .anchor {
	position: absolute;
	top: 0;
	bottom: 0;
	left: 0;
	display: block;
	padding-right: 6px;
            padding-left: 30px;
            margin-left: -30px;
        }

        .markdown-body .anchor:focus {
	outline: none;
}

        .markdown-body h1,
        .markdown-body h2,
        .markdown-body h3,
        .markdown-body h4,
        .markdown-body h5,
        .markdown-body h6 {
	position: relative;
	margin-top: 1em;
            margin-bottom: 16px;
            font-weight: bold;
            line-height: 1.4;
        }

        .markdown-body h1 .octicon-link,
        .markdown-body h2 .octicon-link,
        .markdown-body h3 .octicon-link,
        .markdown-body h4 .octicon-link,
        .markdown-body h5 .octicon-link,
        .markdown-body h6 .octicon-link {
	display: none;
	color: #000;
	vertical-align: middle;
        }

        .markdown-body h1:hover .anchor,
        .markdown-body h2:hover .anchor,
        .markdown-body h3:hover .anchor,
        .markdown-body h4:hover .anchor,
        .markdown-body h5:hover .anchor,
        .markdown-body h6:hover .anchor {
	height: 1em;
            padding-left: 8px;
            margin-left: -30px;
            line-height: 1;
            text-decoration: none;
        }

        .markdown-body h1:hover .anchor .octicon-link,
        .markdown-body h2:hover .anchor .octicon-link,
        .markdown-body h3:hover .anchor .octicon-link,
        .markdown-body h4:hover .anchor .octicon-link,
        .markdown-body h5:hover .anchor .octicon-link,
        .markdown-body h6:hover .anchor .octicon-link {
	display: inline-block;
}

        .markdown-body h1 {
	padding-bottom: 0.3em;
            font-size: 2.25em;
            line-height: 1.2;
            border-bottom: 1px solid #eee;
        }

        .markdown-body h2 {
	padding-bottom: 0.3em;
            font-size: 1.75em;
            line-height: 1.225;
            border-bottom: 1px solid #eee;
        }

        .markdown-body h3 {
	font-size: 1.5em;
            line-height: 1.43;
        }

        .markdown-body h4 {
	font-size: 1.25em;
        }

        .markdown-body h5 {
	font-size: 1em;
        }

        .markdown-body h6 {
	font-size: 1em;
            color: #777;
        }

        .markdown-body p,
        .markdown-body blockquote,
        .markdown-body ul,
        .markdown-body ol,
        .markdown-body dl,
        .markdown-body table,
        .markdown-body pre {
	margin-top: 0;
            margin-bottom: 16px;
        }

        .markdown-body hr {
	height: 4px;
            padding: 0;
            margin: 16px 0;
            background-color: #e7e7e7;
            border: 0 none;
        }

        .markdown-body ul,
        .markdown-body ol {
	padding-left: 2em;
        }

        .markdown-body ul ul,
        .markdown-body ul ol,
        .markdown-body ol ol,
        .markdown-body ol ul {
	margin-top: 0;
            margin-bottom: 0;
        }

        .markdown-body li > p {
	margin-top: 16px;
        }

        .markdown-body dl {
	padding: 0;
}

        .markdown-body dl dt {
	padding: 0;
	margin-top: 16px;
            font-size: 1em;
            font-style: italic;
            font-weight: bold;
        }

        .markdown-body dl dd {
	padding: 0 16px;
            margin-bottom: 16px;
        }

        .markdown-body blockquote {
	padding: 0 15px;
            color: #777;
            border-left: 4px solid #ddd;
        }

        .markdown-body blockquote > :first-child {
	margin-top: 0;
        }

        .markdown-body blockquote > :last-child {
	margin-bottom: 0;
        }

        .markdown-body table {
	display: block;
	width: 100%;
	overflow: auto;
	word-break: normal;
            word-break: keep-all;
        }

        .markdown-body table th {
	font-weight: bold;
        }

        .markdown-body table th,
        .markdown-body table td {
	padding: 6px 13px;
            border: 1px solid #ddd;
        }

        .markdown-body table tr {
	background-color: #fff;
            border-top: 1px solid #ccc;
        }

        .markdown-body table tr:nth-child(2n) {
	background-color: #f8f8f8;
        }

        .markdown-body img {
	max-width: 100%;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
        }

        .markdown-body code {
	padding: 0;
	padding-top: 0.2em;
            padding-bottom: 0.2em;
            margin: 0;
            font-size: 85%;
            background-color: rgba(0, 0, 0, 0.04);
            border-radius: 3px;
        }

        .markdown-body code:before,
        .markdown-body code:after {
	letter-spacing: -0.2em;
            content: "\00a0";
        }

        .markdown-body pre > code {
	padding: 0;
	margin: 0;
	font-size: 100%;
            word-break: normal;
            white-space: pre;
            background: transparent;
            border: 0;
        }

        .markdown-body .highlight {
	margin-bottom: 16px;
        }

        .markdown-body .highlight pre,
        .markdown-body pre {
	padding: 16px;
            overflow: auto;
            font-size: 85%;
            line-height: 1.45;
            background-color: #f7f7f7;
            border-radius: 3px;
        }

        .markdown-body .highlight pre {
	margin-bottom: 0;
            word-break: normal;
        }

        .markdown-body pre {
	word-wrap: normal;
        }

        .markdown-body pre code {
	display: inline;
	max-width: initial;
            padding: 0;
            margin: 0;
            overflow: initial;
            line-height: inherit;
            word-wrap: normal;
            background-color: transparent;
            border: 0;
        }

        .markdown-body pre code:before,
        .markdown-body pre code:after {
	content: normal;
}

        .markdown-body .highlight {
	background: #fff;
}

        .markdown-body .highlight .mf,
        .markdown-body .highlight .mh,
        .markdown-body .highlight .mi,
        .markdown-body .highlight .mo,
        .markdown-body .highlight .il,
        .markdown-body .highlight .m {
	color: #945277;
}

        .markdown-body .highlight .s,
        .markdown-body .highlight .sb,
        .markdown-body .highlight .sc,
        .markdown-body .highlight .sd,
        .markdown-body .highlight .s2,
        .markdown-body .highlight .se,
        .markdown-body .highlight .sh,
        .markdown-body .highlight .si,
        .markdown-body .highlight .sx,
        .markdown-body .highlight .s1 {
	color: #df5000;
}

        .markdown-body .highlight .kc,
        .markdown-body .highlight .kd,
        .markdown-body .highlight .kn,
        .markdown-body .highlight .kp,
        .markdown-body .highlight .kr,
        .markdown-body .highlight .kt,
        .markdown-body .highlight .k,
        .markdown-body .highlight .o {
	font-weight: bold;
        }

        .markdown-body .highlight .kt {
	color: #458;
}

        .markdown-body .highlight .c,
        .markdown-body .highlight .cm,
        .markdown-body .highlight .c1 {
	color: #998;
	font-style: italic;
        }

        .markdown-body .highlight .cp,
        .markdown-body .highlight .cs {
	color: #999;
	font-weight: bold;
        }

        .markdown-body .highlight .cs {
	font-style: italic;
        }

        .markdown-body .highlight .n {
	color: #333;
}

        .markdown-body .highlight .na,
        .markdown-body .highlight .nv,
        .markdown-body .highlight .vc,
        .markdown-body .highlight .vg,
        .markdown-body .highlight .vi {
	color: #008080;
}

        .markdown-body .highlight .nb {
	color: #0086B3;
}

        .markdown-body .highlight .nc {
	color: #458;
	font-weight: bold;
        }

        .markdown-body .highlight .no {
	color: #094e99;
}

        .markdown-body .highlight .ni {
	color: #800080;
}

        .markdown-body .highlight .ne {
	color: #990000;
	font-weight: bold;
        }

        .markdown-body .highlight .nf {
	color: #945277;
	font-weight: bold;
        }

        .markdown-body .highlight .nn {
	color: #555;
}

        .markdown-body .highlight .nt {
	color: #000080;
}

        .markdown-body .highlight .err {
	color: #a61717;
	background-color: #e3d2d2;
        }

        .markdown-body .highlight .gd {
	color: #000;
	background-color: #fdd;
        }

        .markdown-body .highlight .gd .x {
	color: #000;
	background-color: #faa;
        }

        .markdown-body .highlight .ge {
	font-style: italic;
        }

        .markdown-body .highlight .gr {
	color: #aa0000;
}

        .markdown-body .highlight .gh {
	color: #999;
}

        .markdown-body .highlight .gi {
	color: #000;
	background-color: #dfd;
        }

        .markdown-body .highlight .gi .x {
	color: #000;
	background-color: #afa;
        }

        .markdown-body .highlight .go {
	color: #888;
}

        .markdown-body .highlight .gp {
	color: #555;
}

        .markdown-body .highlight .gs {
	font-weight: bold;
        }

        .markdown-body .highlight .gu {
	color: #800080;
	font-weight: bold;
        }

        .markdown-body .highlight .gt {
	color: #aa0000;
}

        .markdown-body .highlight .ow {
	font-weight: bold;
        }

        .markdown-body .highlight .w {
	color: #bbb;
}

        .markdown-body .highlight .sr {
	color: #017936;
}

        .markdown-body .highlight .ss {
	color: #8b467f;
}

        .markdown-body .highlight .bp {
	color: #999;
}

        .markdown-body .highlight .gc {
	color: #999;
	background-color: #EAF2F5;
        }

        .markdown-body .octicon {
	font: normal normal 16px octicons-anchor;
            line-height: 1;
            display: inline-block;
            text-decoration: none;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
        }

        .markdown-body .octicon-link:before {
	content: '\f05c';
}

        .markdown-body .task-list-item {
	list-style-type: none;
        }

        .markdown-body .task-list-item + .task-list-item {
	margin-top: 3px;
        }

        .markdown-body .task-list-item input {
	float: left;
	margin: 0.3em 0 0.25em -1.6em;
            vertical-align: middle;
        }

        table td {
	word-wrap: break-word !important;
            word-break: break-all !important;
        }

        /*

        github.com style (c) Vasily Polovnyov <vast@whiteants.net>

        */

        .hljs {
	display: block;
	overflow-x: auto;
            padding: 0.5em;
            color: #333;
            background: #f8f8f8;
            -webkit-text-size-adjust: none;
        }

        .hljs-comment,
        .diff .hljs-header {
	color: #998;
	font-style: italic;
        }

        .hljs-keyword,
        .css .rule .hljs-keyword,
        .hljs-winutils,
        .nginx .hljs-title,
        .hljs-subst,
        .hljs-request,
        .hljs-status {
	color: #333;
	font-weight: bold;
        }

        .hljs-number,
        .hljs-hexcolor,
        .ruby .hljs-constant {
	color: #008080;
}

        .hljs-string,
        .hljs-tag .hljs-value,
        .hljs-doctag,
        .tex .hljs-formula {
	color: #d14;
}

        .hljs-title,
        .hljs-id,
        .scss .hljs-preprocessor {
	color: #900;
	font-weight: bold;
        }

        .hljs-list .hljs-keyword,
        .hljs-subst {
	font-weight: normal;
        }

        .hljs-class .hljs-title,
        .hljs-type,
        .vhdl .hljs-literal,
        .tex .hljs-command {
	color: #458;
	font-weight: bold;
        }

        .hljs-tag,
        .hljs-tag .hljs-title,
        .hljs-rule .hljs-property,
        .django .hljs-tag .hljs-keyword {
	color: #000080;
	font-weight: normal;
        }

        .hljs-attribute,
        .hljs-variable,
        .lisp .hljs-body,
        .hljs-name {
	color: #008080;
}

        .hljs-regexp {
	color: #009926;
}

        .hljs-symbol,
        .ruby .hljs-symbol .hljs-string,
        .lisp .hljs-keyword,
        .clojure .hljs-keyword,
        .scheme .hljs-keyword,
        .tex .hljs-special,
        .hljs-prompt {
	color: #990073;
}

        .hljs-built_in {
	color: #0086b3;
}

        .hljs-preprocessor,
        .hljs-pragma,
        .hljs-pi,
        .hljs-doctype,
        .hljs-shebang,
        .hljs-cdata {
	color: #999;
	font-weight: bold;
        }

        .hljs-deletion {
	background: #fdd;
}

        .hljs-addition {
	background: #dfd;
}

        .diff .hljs-change {
	background: #0086b3;
}

        .hljs-chunk {
	color: #aaa;
}


    </style>

    <style> @media print {
	.hljs {
		overflow: visible;
		word-wrap: break-word !important;
        }
    }</style>
</head>
<body>
<div class="markdown-body">
    <h1 id="toc_0">WP Editor.MD</h1>

    <h2 id="toc_1">使用说明</h2>

    <p><strong>编辑器预览效果最终不影响前端文章效果！文章的样式取决于你的主题样式表，和本插件没有关系！</strong></p>

    <h3 id="toc_2">GFM任务列表</h3>

    <p>此功能仿照Github社区的任务列表功能，实例如下：</p>

    <pre><code class="language-markdown">- [x] Hello World
- [ ] Hello Markdown
- [x] Hello WP-Editor.md</code></pre>

    <h3 id="toc_3">CDN静态地址</h3>

    <p>国内：</p>

    <p><a rel="nofollow" href="https://www.staticfile.org/">Staticfile CDN</a></p>

    <p><a rel="nofollow" href="http://www.bootcdn.cn">BootCDN</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="https://cdnjs.com/">cdnjs</a></p>

    <h3 id="toc_4">前端支持语法高亮</h3>

    <p>开启<code>前端支持语法高亮</code>功能，支持文章语法高亮。语法高亮引擎目前选择的是<a rel="nofollow" target="_blank" href="http://prismjs.com/">PrismJS</a>。</p>

    <p><code>Prism语法高亮加载库</code>此选项为prism加载地址，默认是插件本地加载，个人推荐使用CDN加载，以下是CDN地址，</p>

    <p><strong>PrismJS Version: 1.6.0</strong></p>

    <p>国内：</p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/prism/1.6.0">//cdn.staticfile.org/prism/1.6.0</a></p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/prism/1.6.0">//cdn.bootcss.com/prism/1.6.0</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/prism/1.6.0">//cdnjs.cloudflare.com/ajax/libs/prism/1.6.0</a></p>

    <p><strong>使用说明：</strong></p>

    <pre><code class="language-markdown">```语法类型

这里是你要展示的代码

```</code></pre>

    <p>请务必填写语法类型，否则无法加载语法类型的高亮文件，语法类型请参考<a rel="nofollow" target="_blank" href="http://prismjs.com/download.html">Prism.js Languages</a></p>

    <h3 id="toc_5">语法高亮加载模式</h3>

    <p>该选项有<code>自动加载模式</code>和<code>自定义加载模式</code>：</p>

    <p><code>自动加载模式</code>：此模式根据你的<code>语法类型</code>加载语法高亮所需依赖文件，推荐使用该模式。</p>

    <p><code>自定义加载模式</code>：用户自定义配置语法类型文件。需要到<a target="_blank" rel="nofollow" href="http://prismjs.com/download.html">PrismJS</a>下载所需文件。</p>

    <h3 id="toc_6">Prism语法高亮样式主题</h3>

    <p>开启该选项可更换语法高亮的风格，目前所支持的主题风格如下：</p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism">default</a></p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism-dark">dark</a></p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism-funky">funky</a></p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism-okaidia">okaidia</a></p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism-twilight">twilight</a></p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism-coy">coy</a></p>

    <p><a rel="nofollow" target="_blank" href="http://prismjs.com/index.html?theme=prism-solarizedlight">solarizedlight</a></p>

    <p>若需要更换主题风格，请填入风格单词即可。</p>

    <h3 id="toc_7">Emoji</h3>

    <p>开启该选项则支持Emoji表情支持，若设备支持Emoji表情则优先支持原生加载，例如<code>iOS</code>和<code>MacOS</code>系统等。否则加载图片资源。</p>

    <p>Emoji库支持CDN加载：</p>

    <p>国内：</p>

    <p><strong>Emojify.js Version: 1.1.0</strong></p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/emojify.js/1.1.0">//cdn.staticfile.org/emojify.js/1.1.0</a></p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/emojify.js/1.1.0">//cdn.bootcss.com/emojify.js/1.1.0</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/emojify.js/1.1.0">//cdnjs.cloudflare.com/ajax/libs/emojify.js/1.1.0</a>
    </p>

    <h3 id="toc_8">支持LaTeX科学公式</h3>

    <p>开启此选项则支持KaTeX科学公式的支持：</p>

    <p>使用<code>$$公式$$</code>，支持预览显示，以下皆为实例：</p>

    <pre><code class="language-latex">$$E=mc^2$$

$$c = \\pm\\sqrt{a^2 + b^2}$$

$$
\\dfrac{
	\\tfrac{1}{2}[1-(\\tfrac{1}{2})^n] }
    { 1-\\tfrac{1}{2} } = s_n
$$
</code></pre>

    <p>更多<a rel="nofollow" target="_blank" href="https://github.com/JaxsonWang/WP-Editor.MD/blob/master/Document/latex.md">实例</a>查看</p>

    <p><strong>注意：文档中展示功能语法是单个<code>\</code>，但本插件由于某些原因单<code>\</code>会被转义，所以使用<code>\\</code>来替代！请知悉！</strong></p>

    <p>查看<a rel="nofollow" target="_blank" href="https://khan.github.io/KaTeX/function-support.html">LaTeX</a>的文档</p>

    <h3 id="toc_9">支持文章目录 TOC</h3>

    <p>开启选项支持文章目录支持，提前你得需要安装<a rel="nofollow" target="_blank" href="https://wordpress.org/plugins/table-of-contents-plus/">Table of Contents Plus</a>插件。
    </p>

    <p>格式如下：</p>

    <pre><code class="language-markdown">[toc]

### 标题1

### 标题2

### 标题3
</code></pre>

    <h3 id="toc_10">图像粘贴 ImagePaste</h3>

    <p>此功能将剪贴板的图像直接粘贴到编辑器上，无需将图片手动上传到服务器。</p>

    <p>选择一个图像，按Ctrl+C『Mac：Command+C』进行复制，转到编辑器按Ctrl+V『Mac：Command+V』即可粘贴。</p>

    <p>兼容浏览器：Firefox 18（或更高版本），Google Chrome 24（或更高版本），以及Window 10 Edge浏览器。</p>

    <p>对Safari浏览器不兼容，IE暂未测试。</p>

    <h3 id="toc_11">支持流程图</h3>

    <p><strong>填写请不要有换行，否则解析失败</strong></p>

    <p>语法：</p>

    <pre><code class="language-markdown">$flow
流程图内容
$
</code></pre>

    <p>例如：</p>

    <pre><code class="language-markdown">$flow
st=&gt;start: User login
op=&gt;operation: Operation
cond=&gt;condition: Successful Yes or No?
	e=&gt;end: Into admin
st-&gt;op-&gt;cond
cond(yes)-&gt;e
cond(no)-&gt;op
$
</code></pre>

    <p><strong>流程图加载库：</strong></p>

    <p>依赖<code>Raphael加载库</code>和<code>jQuery加载库</code>选项</p>

    <p>国内：</p>

    <p><strong>FlowChart Version: 1.6.6</strong></p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/flowchart/1.6.6/">//cdn.staticfile.org/flowchart/1.6.6/</a></p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/flowchart/1.6.6/">//cdn.bootcss.com/flowchart/1.6.6/</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/flowchart/1.6.6/">//cdnjs.cloudflare.com/ajax/libs/flowchart/1.6.6/</a>
    </p>

    <p><strong>流程图配置加载库：</strong></p>

    <p>此配置文件是自定义配置文件，默认加载本地文件，有能力可以上传CDN（七牛、又拍云等）。</p>

    <h3 id="toc_12">支持时序图/序列图</h3>

    <p><strong>填写请不要有换行，否则解析失败</strong></p>

    <p>语法：</p>

    <pre><code class="language-markdown">$seq
时序图/序列图内容
$
</code></pre>

    <p>例如：</p>

    <pre><code class="language-markdown">$seq
A-&gt;B: Message
B-&gt;C: Message
C-&gt;A: Message
$
</code></pre>

    <p><strong>时序图/序列图加载库：</strong></p>

    <p>依赖<code>Raphael加载库</code>和<code>Underscore加载库</code>和<code>jQuery加载库</code>选项</p>

    <p>国内：</p>

    <p><strong>Sequence Diagrams Version: 1.0.6</strong></p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/js-sequence-diagrams/1.0.6/">//cdn.staticfile.org/js-sequence-diagrams/1.0.6/</a>
    </p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/js-sequence-diagrams/1.0.6/">//cdn.bootcss.com/js-sequence-diagrams/1.0.6/</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/js-sequence-diagrams/1.0.6/">//cdnjs.cloudflare.com/ajax/libs/js-sequence-diagrams/1.0.6/</a>
    </p>

    <h3 id="toc_13">Raphael加载库</h3>

    <p>国内：</p>

    <p><strong>Raphael Version: 1.8.3</strong></p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/raphael/2.2.7/">//cdn.staticfile.org/raphael/2.2.7/</a></p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/raphael/2.2.7/">//cdn.bootcss.com/raphael/2.2.7/</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/">//cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/</a></p>

    <h3 id="toc_14">Underscore加载库</h3>

    <p>国内：</p>

    <p><strong>Underscore Version: 2.2.7</strong></p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/underscore.js/1.8.3/">//cdn.staticfile.org/underscore.js/1.8.3/</a></p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/underscore.js/1.8.3/">//cdn.bootcss.com/underscore.js/1.8.3/</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/">//cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/</a>
    </p>

    <h3 id="toc_15">jQuery加载库</h3>

    <p>国内：</p>

    <p><strong>jQuery Version: 1.12.4</strong></p>

    <p><a rel="nofollow" href="//cdn.staticfile.org/jquery/1.12.4/">//cdn.staticfile.org/jquery/1.12.4/</a></p>

    <p><a rel="nofollow" href="//cdn.bootcss.com/jquery/1.12.4/">//cdn.bootcss.com/jquery/1.12.4/</a></p>

    <p>国外：</p>

    <p><a rel="nofollow" href="//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/">//cdnjs.cloudflare.com/ajax/libs/jquery/1.12.4/</a></p>

    <h3 id="toc_16">同步滚动</h3>

    <p>关闭该选项不支持<strong>实时预览</strong>，请知悉！</p>

    <h3 id="toc_17">支持HTML富文本解析</h3>

    <p>开启该选项虽然此功能能极大地扩展 Markdown 语法，但也面临着安全上的风险，请慎重开启（已添加XSS过滤机制）！</p>

</div>
</body>

</html>
