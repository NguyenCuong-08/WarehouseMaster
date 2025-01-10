<style id="style_ladi" type="text/css">
    a,
    abbr,
    acronym,
    address,
    applet,
    article,
    aside,
    audio,
    b,
    big,
    blockquote,
    body,
    button,
    canvas,
    caption,
    center,
    cite,
    code,
    dd,
    del,
    details,
    dfn,
    div,
    dl,
    dt,
    em,
    embed,
    fieldset,
    figcaption,
    figure,
    footer,
    form,
    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    header,
    hgroup,
    html,
    i,
    iframe,
    img,
    input,
    ins,
    kbd,
    label,
    legend,
    li,
    mark,
    menu,
    nav,
    object,
    ol,
    output,
    p,
    pre,
    q,
    ruby,
    s,
    samp,
    section,
    select,
    small,
    span,
    strike,
    strong,
    sub,
    summary,
    sup,
    table,
    tbody,
    td,
    textarea,
    tfoot,
    th,
    thead,
    time,
    tr,
    tt,
    u,
    ul,
    var,
    video {
        margin: 0;
        padding: 0;
        border: 0;
        outline: 0;
        font-size: 100%;
        font: inherit;
        vertical-align: baseline;
        box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale
    }

    article,
    aside,
    details,
    figcaption,
    figure,
    footer,
    header,
    hgroup,
    menu,
    nav,
    section {
        display: block
    }

    body {
        line-height: 1
    }

    a {
        text-decoration: none
    }

    ol,
    ul {
        list-style: none
    }

    blockquote,
    q {
        quotes: none
    }

    blockquote:after,
    blockquote:before,
    q:after,
    q:before {
        content: '';
        content: none
    }

    table {
        border-collapse: collapse;
        border-spacing: 0
    }

    .ladi-loading {
        z-index: 900000000000;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        background-color: rgba(0, 0, 0, .1)
    }

    .ladi-loading .loading {
        width: 80px;
        height: 80px;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        overflow: hidden;
        position: absolute
    }

    .ladi-loading .loading div {
        position: absolute;
        width: 6px;
        height: 6px;
        background: #fff;
        border-radius: 50%;
        animation: ladi-loading 1.2s linear infinite
    }

    .ladi-loading .loading div:nth-child(1) {
        animation-delay: 0s;
        top: 37px;
        left: 66px
    }

    .ladi-loading .loading div:nth-child(2) {
        animation-delay: -.1s;
        top: 22px;
        left: 62px
    }

    .ladi-loading .loading div:nth-child(3) {
        animation-delay: -.2s;
        top: 11px;
        left: 52px
    }

    .ladi-loading .loading div:nth-child(4) {
        animation-delay: -.3s;
        top: 7px;
        left: 37px
    }

    .ladi-loading .loading div:nth-child(5) {
        animation-delay: -.4s;
        top: 11px;
        left: 22px
    }

    .ladi-loading .loading div:nth-child(6) {
        animation-delay: -.5s;
        top: 22px;
        left: 11px
    }

    .ladi-loading .loading div:nth-child(7) {
        animation-delay: -.6s;
        top: 37px;
        left: 7px
    }

    .ladi-loading .loading div:nth-child(8) {
        animation-delay: -.7s;
        top: 52px;
        left: 11px
    }

    .ladi-loading .loading div:nth-child(9) {
        animation-delay: -.8s;
        top: 62px;
        left: 22px
    }

    .ladi-loading .loading div:nth-child(10) {
        animation-delay: -.9s;
        top: 66px;
        left: 37px
    }

    .ladi-loading .loading div:nth-child(11) {
        animation-delay: -1s;
        top: 62px;
        left: 52px
    }

    .ladi-loading .loading div:nth-child(12) {
        animation-delay: -1.1s;
        top: 52px;
        left: 62px
    }

    @keyframes ladi-loading {

        0%,
        100%,
        20%,
        80% {
            transform: scale(1)
        }

        50% {
            transform: scale(1.5)
        }
    }

    .ladipage-message {
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        z-index: 10000000000;
        background: rgba(0, 0, 0, .3)
    }

    .ladipage-message .ladipage-message-box {
        width: 400px;
        max-width: calc(100% - 50px);
        height: 160px;
        border: 1px solid rgba(0, 0, 0, .3);
        background-color: #fff;
        position: fixed;
        top: calc(50% - 155px);
        left: 0;
        right: 0;
        margin: auto;
        border-radius: 10px
    }

    .ladipage-message .ladipage-message-box span {
        display: block;
        background-color: rgba(6, 21, 40, .05);
        color: #000;
        padding: 12px 15px;
        font-weight: 600;
        font-size: 16px;
        line-height: 16px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px
    }

    .ladipage-message .ladipage-message-box .ladipage-message-text {
        display: -webkit-box;
        font-size: 14px;
        padding: 0 20px;
        margin-top: 10px;
        line-height: 18px;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis
    }

    .ladipage-message .ladipage-message-box .ladipage-message-close {
        display: block;
        position: absolute;
        right: 15px;
        bottom: 10px;
        margin: 0 auto;
        padding: 10px 0;
        border: none;
        width: 80px;
        text-transform: uppercase;
        text-align: center;
        color: #000;
        background-color: #e6e6e6;
        border-radius: 5px;
        text-decoration: none;
        font-size: 14px;
        line-height: 14px;
        font-weight: 600;
        cursor: pointer;
        outline: 0
    }

    .lightbox-screen {
        display: none;
        position: fixed;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        z-index: 9000000080;
        background: rgba(0, 0, 0, .5)
    }

    .lightbox-screen .lightbox-close {
        position: absolute;
        z-index: 9000000090;
        cursor: pointer
    }

    .lightbox-screen .lightbox-hidden {
        display: none
    }

    .lightbox-screen .lightbox-close {
        width: 16px;
        height: 16px;
        margin: 10px;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url("data:image/svg+xml;utf8, %3Csvg%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22%23fff%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M23.4144%202.00015L2.00015%2023.4144L0.585938%2022.0002L22.0002%200.585938L23.4144%202.00015Z%22%3E%3C%2Fpath%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M2.00015%200.585938L23.4144%2022.0002L22.0002%2023.4144L0.585938%202.00015L2.00015%200.585938Z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E")
    }

    body {
        font-size: 12px;
        -ms-text-size-adjust: none;
        -moz-text-size-adjust: none;
        -o-text-size-adjust: none;
        -webkit-text-size-adjust: none;
        background-color: #fff;
    }

    .overflow-hidden {
        overflow: hidden;
    }

    .ladi-transition {
        transition: all 150ms linear 0s;
    }

    .z-index-1 {
        z-index: 1;
    }

    .opacity-0 {
        opacity: 0;
    }

    .height-0 {
        height: 0 !important;
    }

    .pointer-events-none {
        pointer-events: none;
    }

    .transition-parent-collapse-height {
        transition: height 150ms linear 0s;
    }

    .transition-parent-collapse-top {
        transition: top 150ms linear 0s;
    }

    .transition-readmore {
        transition: height 350ms linear 0s;
    }

    .transition-collapse {
        transition: height 150ms linear 0s;
    }

    body.grab {
        cursor: grab;
    }

    .ladi-wraper {
        width: 100%;
        min-height: 100%;
        overflow: hidden;
    }

    .ladi-container {
        position: relative;
        margin: 0 auto;
        height: 100%;
    }

    .ladi-overlay {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        pointer-events: none;
    }

    .ladi-element {
        position: absolute;
    }

    @media (hover: hover) {
        .ladi-check-hover {
            opacity: 0;
        }
    }

    .ladi-section {
        margin: 0 auto;
        position: relative;
    }

    .ladi-section[data-tab-id] {
        display: none;
    }

    .ladi-section.selected[data-tab-id] {
        display: block;
    }

    .ladi-section .ladi-section-background {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
        overflow: hidden;
    }

    .ladi-carousel {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ladi-carousel .ladi-carousel-content {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        transition: top 350ms ease-in-out, left 350ms ease-in-out;
    }

    .ladi-carousel .ladi-carousel-arrow {
        position: absolute;
        top: calc(50% - (33px) / 2);
        cursor: pointer;
        z-index: 90000040;
        width: 33px;
        height: 33px;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url("data:image/svg+xml;utf8, %3Csvg%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22%23000%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M7.00015%200.585938L18.4144%2012.0002L7.00015%2023.4144L5.58594%2022.0002L15.5859%2012.0002L5.58594%202.00015L7.00015%200.585938Z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E");
    }

    .ladi-carousel .ladi-carousel-arrow-left {
        left: 5px;
        transform: rotateY(180deg);
        -webkit-transform: rotateY(180deg);
    }

    .ladi-carousel .ladi-carousel-arrow-right {
        right: 5px;
    }

    .ladi-carousel-indicators-circle {
        display: inline-flex;
        gap: 10px;
        position: absolute;
        bottom: -20px;
        left: 0;
        right: 0;
        margin: auto;
        width: fit-content;
    }

    .ladi-carousel-indicators-circle .item {
        width: 10px;
        height: 10px;
        background-color: #D6D6D6;
        border-radius: 100%;
        cursor: pointer;
        outline: 1px solid #fff;
    }

    .ladi-carousel-indicators-circle .item.selected,
    .ladi-carousel-indicators-circle .item:hover {
        background-color: #808080;
    }

    .ladi-carousel-indicators-number {
        display: inline-flex;
        gap: 10px;
        position: absolute;
        bottom: -20px;
        left: 0;
        right: 0;
        margin: auto;
        width: fit-content;
    }

    .ladi-carousel-indicators-number .item {
        width: 15px;
        height: 15px;
        background-color: #D6D6D6;
        border-radius: 100%;
        cursor: pointer;
        font-size: 10px;
        text-align: center;
        line-height: 15px;
        outline: 1px solid #fff;
    }

    .ladi-carousel-indicators-number .item.selected,
    .ladi-carousel-indicators-number .item:hover {
        background-color: #808080;
        color: #fff;
    }

    .ladi-table {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: auto;
    }

    .ladi-table table {
        width: 100%;
    }

    .ladi-table table td {
        vertical-align: middle;
    }

    .ladi-table tbody td {
        word-break: break-word;
    }

    .ladi-table table td img {
        cursor: pointer;
        width: 100%;
    }

    .ladi-box {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ladi-tabs {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .ladi-tabs .ladi-tabs-background {
        height: 100%;
        width: 100%;
        pointer-events: none;
    }

    .ladi-tabs>.ladi-element[data-index] {
        display: none;
    }

    .ladi-tabs>.ladi-element.selected[data-index] {
        display: block;
    }

    .ladi-frame {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ladi-frame-bg .ladi-frame-background {
        height: 100%;
        width: 100%;
        pointer-events: none;
        transition: inherit;
    }

    .ladi-frame-bg:not(.ladi-frame) {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    #SECTION_POPUP .ladi-container {
        z-index: 90000070;
    }

    #SECTION_POPUP .ladi-container>.ladi-element {
        z-index: 90000070;
        position: fixed;
        display: none;
    }

    #SECTION_POPUP .ladi-container>.ladi-element[data-fixed-close="true"] {
        position: relative !important;
    }

    #SECTION_POPUP .ladi-container>.ladi-element.hide-visibility {
        display: block !important;
        visibility: hidden !important;
    }

    #SECTION_POPUP .popup-close {
        position: absolute;
        right: 0px;
        top: 0px;
        z-index: 9000000080;
        cursor: pointer;
        width: 16px;
        height: 16px;
        margin: 10px;
        background-repeat: no-repeat;
        background-position: center center;
        background-image: url("data:image/svg+xml;utf8, %3Csvg%20width%3D%2224%22%20height%3D%2224%22%20viewBox%3D%220%200%2024%2024%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20fill%3D%22%23000%22%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M23.4144%202.00015L2.00015%2023.4144L0.585938%2022.0002L22.0002%200.585938L23.4144%202.00015Z%22%3E%3C%2Fpath%3E%3Cpath%20fill-rule%3D%22evenodd%22%20clip-rule%3D%22evenodd%22%20d%3D%22M2.00015%200.585938L23.4144%2022.0002L22.0002%2023.4144L0.585938%202.00015L2.00015%200.585938Z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E");
    }

    .ladi-popup {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .ladi-popup .ladi-popup-background {
        height: 100%;
        width: 100%;
        pointer-events: none;
    }

    .ladi-button {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ladi-button:active {
        transform: translateY(2px);
        transition: transform 0.2s linear;
    }

    .ladi-button .ladi-button-background {
        height: 100%;
        width: 100%;
        pointer-events: none;
        transition: inherit;
    }

    .ladi-button>.ladi-button-headline,
    .ladi-button>.ladi-button-shape {
        width: 100% !important;
        height: 100% !important;
        top: 0 !important;
        left: 0 !important;
        display: table;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .ladi-button>.ladi-button-shape .ladi-shape {
        margin: auto;
        top: 0;
        bottom: 0;
    }

    .ladi-button>.ladi-button-headline .ladi-headline {
        display: table-cell;
        vertical-align: middle;
    }

    .ladi-form {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .ladi-form>.ladi-element {
        text-transform: inherit;
        text-decoration: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form .ladi-button>.ladi-button-headline {
        color: initial;
        font-size: initial;
        font-weight: initial;
        text-transform: initial;
        text-decoration: initial;
        font-style: initial;
        text-align: initial;
        letter-spacing: initial;
        line-height: initial;
    }

    .ladi-form>.ladi-element .ladi-form-item-container {
        text-transform: inherit;
        text-decoration: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form>[data-quantity="true"] .ladi-form-item-container {
        overflow: hidden;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item {
        text-transform: inherit;
        text-decoration: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item-background {
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select {
        -webkit-appearance: none;
        -moz-appearance: none;
        appearance: none;
        background-size: 9px 6px !important;
        background-position: right .5rem center;
        background-repeat: no-repeat;
        padding-right: 24px;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select-2 {
        width: calc(100% / 2 - 5px);
        max-width: calc(100% / 2 - 5px);
        min-width: calc(100% / 2 - 5px);
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select-2:nth-child(3) {
        margin-left: 7.5px;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select-3 {
        width: calc(100% / 3 - 5px);
        max-width: calc(100% / 3 - 5px);
        min-width: calc(100% / 3 - 5px);
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select-3:nth-child(3) {
        margin-left: 7.5px;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select-3:nth-child(4) {
        margin-left: 7.5px;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select option {
        color: initial;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control:not(.ladi-form-control-select) {
        text-transform: inherit;
        text-decoration: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select {
        text-transform: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-control-select:not([data-selected=""]) {
        text-decoration: inherit;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-checkbox-item {
        text-transform: inherit;
        text-decoration: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
        vertical-align: middle;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-checkbox-box-item {
        display: inline-block;
        width: fit-content;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-checkbox-item span {
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-checkbox-item span[data-checked="true"] {
        text-transform: inherit;
        text-decoration: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form>.ladi-element .ladi-form-item-container .ladi-form-item .ladi-form-checkbox-item span[data-checked="false"] {
        text-transform: inherit;
        text-align: inherit;
        letter-spacing: inherit;
        color: inherit;
        background-size: inherit;
        background-attachment: inherit;
        background-origin: inherit;
    }

    .ladi-form .ladi-form-item-container {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .ladi-form .ladi-form-item-title-value {
        font-weight: bold;
        word-break: break-word;
    }

    .ladi-form .ladi-form-label-container {
        position: relative;
        width: 100%;
    }

    .ladi-form .ladi-form-control-file {
        background-repeat: no-repeat;
        background-position: calc(100% - 5px) center;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item {
        display: inline-block;
        cursor: pointer;
        position: relative;
        border-radius: 0px !important;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.image {
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.no-value {
        display: none !important;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.text.disabled {
        opacity: 0.35;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.image.disabled {
        opacity: 0.2;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.color.disabled {
        opacity: 0.15;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.selected:before {
        content: '';
        width: 0;
        height: 0;
        bottom: -1px;
        right: -1px;
        position: absolute;
        border-width: 0 0 15px 15px;
        border-color: transparent;
        border-style: solid;
    }

    .ladi-form .ladi-form-label-container .ladi-form-label-item.selected:after {
        content: '';
        background-image: url("data:image/svg+xml;utf8,%3Csvg xmlns='http://www.w3.org/2000/svg' enable-background='new 0 0 12 12' viewBox='0 0 12 12' x='0' fill='%23fff' y='0'%3E%3Cg%3E%3Cpath d='m5.2 10.9c-.2 0-.5-.1-.7-.2l-4.2-3.7c-.4-.4-.5-1-.1-1.4s1-.5 1.4-.1l3.4 3 5.1-7c .3-.4 1-.5 1.4-.2s.5 1 .2 1.4l-5.7 7.9c-.2.2-.4.4-.7.4 0-.1 0-.1-.1-.1z'%3E%3C/path%3E%3C/g%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: bottom right;
        width: 7px;
        height: 7px;
        bottom: 0;
        right: 0;
        position: absolute;
    }

    .ladi-form .ladi-form-item {
        width: 100%;
        height: 100%;
        position: absolute;
    }

    .ladi-form .ladi-form-item-background {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .ladi-form .ladi-form-item.ladi-form-checkbox {
        height: auto;
    }

    .ladi-form .ladi-form-item .ladi-form-control {
        background-color: transparent;
        min-width: 100%;
        min-height: 100%;
        max-width: 100%;
        max-height: 100%;
        width: 100%;
        height: 100%;
        padding: 0 5px;
        color: inherit;
        font-size: inherit;
        border: none;
    }

    .ladi-form .ladi-form-item.ladi-form-checkbox {
        padding: 0 5px;
    }

    .ladi-form .ladi-form-item.ladi-form-checkbox.ladi-form-checkbox-vertical .ladi-form-checkbox-item {
        margin-top: 0 !important;
        margin-left: 0 !important;
        margin-right: 0 !important;
        display: flex;
        align-items: center;
        border: none;
    }

    .ladi-form .ladi-form-item.ladi-form-checkbox.ladi-form-checkbox-horizontal .ladi-form-checkbox-item {
        margin-top: 0 !important;
        margin-left: 0 !important;
        margin-right: 10px !important;
        display: inline-flex;
        align-items: center;
        border: none;
        position: relative;
    }

    .ladi-form .ladi-form-item.ladi-form-checkbox .ladi-form-checkbox-item input {
        margin-right: 5px;
        display: block;
    }

    .ladi-form .ladi-form-item.ladi-form-checkbox .ladi-form-checkbox-item span {
        cursor: default;
        word-break: break-word;
    }

    .ladi-form .ladi-form-item textarea.ladi-form-control {
        resize: none;
        padding: 5px;
    }

    .ladi-form .ladi-button {
        cursor: pointer;
    }

    .ladi-form .ladi-button .ladi-headline {
        cursor: pointer;
        user-select: none;
    }

    .ladi-form .ladi-element .ladi-form-otp::-webkit-outer-spin-button,
    .ladi-form .ladi-element .ladi-form-otp::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .ladi-form .ladi-element .ladi-form-item .button-get-code {
        display: none;
        position: absolute;
        right: 0;
        top: 0;
        bottom: 0;
        margin: auto 0;
        line-height: initial;
        padding: 5px 10px;
        height: max-content;
        cursor: pointer;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .ladi-form .ladi-element .ladi-form-item .button-get-code.hide-visibility {
        display: block !important;
        visibility: hidden !important;
    }

    .ladi-form .ladi-form-item.otp-resend .button-get-code {
        display: block;
    }

    .ladi-form .ladi-form-item.otp-countdown:before {
        content: attr(data-countdown-time) "s";
        position: absolute;
        top: 0;
        bottom: 0;
        margin: auto 0;
        height: max-content;
        line-height: initial;
    }

    .ladi-form [data-variant="true"] select option[disabled] {
        background: #fff;
        color: #b8b8b8 !important;
    }

    .ladi-google-recaptcha-checkbox {
        position: absolute;
        display: inline-block;
        transform: translateY(-100%);
        margin-top: -5px;
        z-index: 90000010;
    }

    .ladi-video {
        position: absolute;
        width: 100%;
        height: 100%;
        cursor: pointer;
        overflow: hidden;
    }

    .ladi-video .ladi-video-background {
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        pointer-events: none;
    }

    .button-unmute {
        cursor: pointer;
        position: absolute;
        width: 100%;
        height: 100%;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        margin: auto;
    }

    .button-unmute div {
        background-image: url("data:image/svg+xml;utf8, %3Csvg%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%20viewBox%3D%220%200%2036%2036%22%20width%3D%22100%25%22%20height%3D%22100%25%22%20fill%3D%22%23fff%22%3E%3Cpath%20d%3D%22m%2021.48%2C17.98%20c%200%2C-1.77%20-1.02%2C-3.29%20-2.5%2C-4.03%20v%202.21%20l%202.45%2C2.45%20c%20.03%2C-0.2%20.05%2C-0.41%20.05%2C-0.63%20z%20m%202.5%2C0%20c%200%2C.94%20-0.2%2C1.82%20-0.54%2C2.64%20l%201.51%2C1.51%20c%20.66%2C-1.24%201.03%2C-2.65%201.03%2C-4.15%200%2C-4.28%20-2.99%2C-7.86%20-7%2C-8.76%20v%202.05%20c%202.89%2C.86%205%2C3.54%205%2C6.71%20z%20M%209.25%2C8.98%20l%20-1.27%2C1.26%204.72%2C4.73%20H%207.98%20v%206%20H%2011.98%20l%205%2C5%20v%20-6.73%20l%204.25%2C4.25%20c%20-0.67%2C.52%20-1.42%2C.93%20-2.25%2C1.18%20v%202.06%20c%201.38%2C-0.31%202.63%2C-0.95%203.69%2C-1.81%20l%202.04%2C2.05%201.27%2C-1.27%20-9%2C-9%20-7.72%2C-7.72%20z%20m%207.72%2C.99%20-2.09%2C2.08%202.09%2C2.09%20V%209.98%20z%22%3E%3C%2Fpath%3E%3C%2Fsvg%3E");
        width: 60px;
        height: 60px;
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        margin: auto;
        background-color: rgba(0, 0, 0, 0.5);
        border-radius: 100%;
        background-size: 90%;
        background-repeat: no-repeat;
        background-position: center center;
    }

    .ladi-group {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .ladi-accordion {
        position: absolute;
        width: 100%;
        height: 100%;
    }

    .ladi-accordion .ladi-accordion-shape {
        width: 100% !important;
        height: 100% !important;
        top: 0 !important;
        left: 0 !important;
        display: table;
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
    }

    .ladi-shape {
        position: absolute;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .ladi-cart-number {
        position: absolute;
        top: -2px;
        right: -7px;
        background: #f36e36;
        text-align: center;
        width: 18px;
        height: 18px;
        line-height: 18px;
        font-size: 12px;
        font-weight: bold;
        color: #fff;
        border-radius: 100%;
    }

    .ladi-image {
        position: absolute;
        width: 100%;
        height: 100%;
        overflow: hidden;
    }

    .ladi-image .ladi-image-background {
        background-repeat: no-repeat;
        background-position: left top;
        background-size: cover;
        background-attachment: scroll;
        background-origin: content-box;
        position: absolute;
        margin: 0 auto;
        width: 100%;
        height: 100%;
        pointer-events: none;
    }

    .ladi-headline {
        width: 100%;
        display: inline-block;
        word-break: break-word;
        background-size: cover;
        background-position: center center;
    }

    .ladi-headline a {
        text-decoration: underline;
    }

    .ladi-paragraph {
        width: 100%;
        display: inline-block;
        word-break: break-word;
    }

    .ladi-paragraph a {
        text-decoration: underline;
    }

    .ladi-line {
        position: relative;
    }

    .ladi-line .ladi-line-container {
        border-bottom: 0 !important;
        border-right: 0 !important;
        width: 100%;
        height: 100%;
    }

    a[data-action] {
        user-select: none;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        cursor: pointer
    }

    a:visited {
        color: inherit
    }

    a:link {
        color: inherit
    }

    [data-opacity="0"] {
        opacity: 0
    }

    [data-hidden="true"] {
        display: none
    }

    [data-action="true"] {
        cursor: pointer
    }

    .ladi-hidden {
        display: none
    }

    .ladi-animation-hidden {
        visibility: hidden !important;
        opacity: 0 !important
    }

    .element-click-selected {
        cursor: pointer
    }

    .is-2nd-click {
        cursor: pointer
    }

    .ladi-button-shape.is-2nd-click,
    .ladi-accordion-shape.is-2nd-click {
        z-index: 1
    }

    .backdrop-popup {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 90000060
    }

    .backdrop-dropbox {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        z-index: 90000040
    }

    .ladi-lazyload {
        background-image: none !important;
    }

    .ladi-list-paragraph ul li.ladi-lazyload:before {
        background-image: none !important;
    }

    @media (min-width: 768px) {
        .ladi-carousel-fullwidth {
            width: 100vw !important;
            left: calc(-50vw + 50%) !important;
            box-sizing: border-box !important;
            transform: none !important;
        }
    }

    @media (max-width: 767px) {
        .ladi-element.ladi-auto-scroll {
            overflow-x: auto;
            overflow-y: hidden;
            width: 100% !important;
            left: 0 !important;
            -webkit-overflow-scrolling: touch;
        }

        [data-hint]:not([data-timeout-id-copied]):before,
        [data-hint]:not([data-timeout-id-copied]):after {
            display: none !important;
        }

        .ladi-section.ladi-auto-scroll {
            overflow-x: auto;
            overflow-y: hidden;
            -webkit-overflow-scrolling: touch;
        }

        .ladi-carousel .ladi-carousel-content {
            transition: top 300ms ease-in-out, left 300ms ease-in-out;
        }
    }
</style>
<style type="text/css" id="style_animation">
    @media (min-width: 768px) {

        #IMAGE8,
        #BUTTON2,
        #IMAGE54,
        #IMAGE57 {
            opacity: 0 !important;
            pointer-events: none !important;
        }
    }

    @media (max-width: 767px) {

        #IMAGE8,
        #BUTTON2,
        #IMAGE54,
        #IMAGE57 {
            opacity: 0 !important;
            pointer-events: none !important;
        }
    }
</style>
<style id="style_page" type="text/css">
    body {
        direction: ltr;
    }

    @media (min-width: 768px) {
        .ladi-section .ladi-container {
            width: 960px;
        }
    }

    @media (max-width: 767px) {
        .ladi-section .ladi-container {
            width: 420px;
        }
    }

    @font-face {
        font-family: "TWudHNlcnJhdCWYXJpYWJsZUZvbnRfddodCdGY";
        src: url("https://w.ladicdn.com/5e9ebf43b17ed933fa24046b/montserrat-variablefont_wght-20230919075442-kk_7e.ttf") format("truetype");
    }

    @font-face {
        font-family: "TWudHNlcnJhdCWYXJpYWJsZUZvbnRfddodCdGY";
        src: url("https://w.ladicdn.com/5e9ebf43b17ed933fa24046b/montserrat-variablefont_wght-20230919075442-kk_7e.ttf") format("truetype");
    }

    @font-face {
        font-family: "TnVcmljYXJlUHJvLVJlZVsYXIudHRm";
        src: url("https://w.ladicdn.com/5e9ebf43b17ed933fa24046b/nutricarepro-regular-20220519090336.ttf") format("truetype");
    }

    body {
        font-family: TWudHNlcnJhdCWYXJpYWJsZUZvbnRfddodCdGY
    }
    #video-2{
        width: 1195.02px;
        height: 672.2px;
        top: 0px;
        left: -120.466px;
    }
    #video-2_player{
        display:none;
    }
</style>
<style id="style_element" type="text/css">
    #SECTION1>.ladi-section-background,
    #SECTION14>.ladi-section-background,
    #TABLE11 table thead td,
    #TABLE10 table thead td,
    #TABLE2 table thead td,
    #TABLE5 table thead td {
        background-color: rgb(255, 233, 242);
    }

    #IMAGE34>.ladi-image>.ladi-image-background,
    #IMAGE38>.ladi-image>.ladi-image-background,
    #IMAGE112>.ladi-image>.ladi-image-background,
    #IMAGE111>.ladi-image>.ladi-image-background,
    #IMAGE49>.ladi-image>.ladi-image-background,
    #IMAGE50>.ladi-image>.ladi-image-background,
    #IMAGE120>.ladi-image>.ladi-image-background,
    #IMAGE122>.ladi-image>.ladi-image-background,
    #IMAGE121>.ladi-image>.ladi-image-background,
    #VIDEO9,
    #IMAGE86>.ladi-image>.ladi-image-background,
    #IMAGE87>.ladi-image>.ladi-image-background,
    #IMAGE110>.ladi-image>.ladi-image-background,
    #IMAGE88>.ladi-image>.ladi-image-background,
    #IMAGE89>.ladi-image>.ladi-image-background,
    #IMAGE90>.ladi-image>.ladi-image-background,
    #IMAGE52>.ladi-image>.ladi-image-background,
    #IMAGE53>.ladi-image>.ladi-image-background,
    #IMAGE54>.ladi-image>.ladi-image-background,
    #IMAGE56>.ladi-image>.ladi-image-background,
    #IMAGE57>.ladi-image>.ladi-image-background,
    #IMAGE58>.ladi-image>.ladi-image-background,
    #IMAGE95>.ladi-image>.ladi-image-background,
    #ACCORDION_MENU26,
    #IMAGE94>.ladi-image>.ladi-image-background,
    #ACCORDION_MENU18,
    #IMAGE96>.ladi-image>.ladi-image-background,
    #ACCORDION_MENU28,
    #IMAGE97,
    #IMAGE97>.ladi-image>.ladi-image-background,
    #ACCORDION_MENU30,
    #TAB_ITEM36,
    #IMAGE64>.ladi-image>.ladi-image-background,
    #TAB_ITEM35,
    #IMAGE63>.ladi-image>.ladi-image-background,
    #IMAGE67>.ladi-image>.ladi-image-background,
    #IMAGE93,
    #IMAGE93>.ladi-image>.ladi-image-background,
    #ACCORDION_MENU40,
    #IMAGE109>.ladi-image>.ladi-image-background,
    #IMAGE68>.ladi-image>.ladi-image-background,
    #IMAGE91>.ladi-image>.ladi-image-background,
    #IMAGE107>.ladi-image>.ladi-image-background,
    #IMAGE108>.ladi-image>.ladi-image-background,
    #IMAGE105>.ladi-image>.ladi-image-background,
    #IMAGE106>.ladi-image>.ladi-image-background,
    #CAROUSEL_ITEM43,
    #IMAGE71>.ladi-image>.ladi-image-background,
    #IMAGE72>.ladi-image>.ladi-image-background,
    #IMAGE73>.ladi-image>.ladi-image-background,
    #IMAGE74>.ladi-image>.ladi-image-background,
    #IMAGE84>.ladi-image>.ladi-image-background,
    #IMAGE85>.ladi-image>.ladi-image-background,
    #IMAGE1>.ladi-image>.ladi-image-background,
    #IMAGE2>.ladi-image>.ladi-image-background,
    #IMAGE3>.ladi-image>.ladi-image-background,
    #IMAGE4>.ladi-image>.ladi-image-background,
    #IMAGE5>.ladi-image>.ladi-image-background,
    #IMAGE6>.ladi-image>.ladi-image-background,
    #BUTTON32,
    #IMAGE7>.ladi-image>.ladi-image-background,
    #IMAGE8>.ladi-image>.ladi-image-background,
    #IMAGE9>.ladi-image>.ladi-image-background,
    #IMAGE10>.ladi-image>.ladi-image-background,
    #IMAGE12>.ladi-image>.ladi-image-background,
    #IMAGE13>.ladi-image>.ladi-image-background,
    #IMAGE11>.ladi-image>.ladi-image-background,
    #IMAGE14>.ladi-image>.ladi-image-background,
    #BOX1,
    #TAB_ITEM1_HN2,
    #IMAGE44>.ladi-image>.ladi-image-background,
    #TAB_ITEM1_HNSBPS,
    #IMAGE48>.ladi-image>.ladi-image-background,
    #BUTTON3,
    #IMAGE75>.ladi-image>.ladi-image-background,
    #IMAGE77>.ladi-image>.ladi-image-background,
    #IMAGE92>.ladi-image>.ladi-image-background,
    #ACCORDION_MENU2,
    #IMAGE104>.ladi-image>.ladi-image-background,
    #IMAGE103>.ladi-image>.ladi-image-background,
    #IMAGE98>.ladi-image>.ladi-image-background,
    #IMAGE15>.ladi-image>.ladi-image-background,
    #IMAGE16>.ladi-image>.ladi-image-background,
    #IMAGE99>.ladi-image>.ladi-image-background,
    #IMAGE100>.ladi-image>.ladi-image-background,
    #CAROUSEL_ITEM5,
    #IMAGE23>.ladi-image>.ladi-image-background,
    #IMAGE24>.ladi-image>.ladi-image-background,
    #IMAGE25>.ladi-image>.ladi-image-background,
    #IMAGE40>.ladi-image>.ladi-image-background,
    #IMAGE26>.ladi-image>.ladi-image-background,
    #IMAGE27>.ladi-image>.ladi-image-background,
    #BOX2,
    #FORM_ITEM2,
    #IMAGE28>.ladi-image>.ladi-image-background,
    #LINE25,
    #IMAGE130>.ladi-image>.ladi-image-background,
    #IMAGE131>.ladi-image>.ladi-image-background,
    #IMAGE132>.ladi-image>.ladi-image-background,
    #IMAGE133>.ladi-image>.ladi-image-background,
    #IMAGE134>.ladi-image>.ladi-image-background,
    #IMAGE135>.ladi-image>.ladi-image-background,
    #IMAGE136>.ladi-image>.ladi-image-background,
    #HEADLINE70,
    #POPUP2,
    #POPUP3,
    #POPUP4,
    #POPUP5,
    #POPUP6,
    #POPUP7,
    #POPUP8,
    #IMAGE78>.ladi-image>.ladi-image-background,
    #POPUP9,
    #IMAGE79>.ladi-image>.ladi-image-background,
    #POPUP10,
    #IMAGE80>.ladi-image>.ladi-image-background,
    #POPUP11,
    #IMAGE81>.ladi-image>.ladi-image-background,
    #IMAGE82>.ladi-image>.ladi-image-background,
    #IMAGE83>.ladi-image>.ladi-image-background,
    #POPUP12,
    #POPUP13,
    #DROPBOX14 {
        top: 0px;
        left: 0px;
    }

    #IMAGE34>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x400/5e9ebf43b17ed933fa24046b/asset-35-20230915094557-zfzmw.png");
    }

    #HEADLINE42,
    #HEADLINE43 {
        width: 200px;
    }

    #HEADLINE42>.ladi-headline,
    #HEADLINE43>.ladi-headline,
    #HEADLINE44>.ladi-headline,
    #HEADLINE47>.ladi-headline {
        font-weight: bold;
        line-height: 1.6;
        color: rgb(216, 0, 133);
    }

    #IMAGE112,
    #IMAGE112>.ladi-image>.ladi-image-background {
        width: 53.3545px;
        height: 21.9972px;
    }

    #IMAGE112>.ladi-image>.ladi-image-background,
    #IMAGE121>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x350/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web222-04-20240529061948-lkkzy.png");
    }

    #IMAGE111,
    #IMAGE111>.ladi-image>.ladi-image-background {
        width: 53.3545px;
        height: 21.0599px;
    }

    #IMAGE111>.ladi-image>.ladi-image-background,
    #IMAGE122>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x350/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web-04-20240529061948-jmjiq.png");
    }

    #SHAPE8 {
        width: 40.3055px;
        height: 38.7543px;
    }

    #SHAPE8 svg:last-child,
    #ACCORDION_SHAPE13 svg:last-child,
    #ACCORDION_SHAPE9 svg:last-child,
    #ACCORDION_SHAPE14 svg:last-child,
    #ACCORDION_SHAPE15 svg:last-child {
        fill: rgb(0, 0, 0);
    }

    #IMAGE49,
    #IMAGE49>.ladi-image>.ladi-image-background {
        height: 52.1481px;
    }

    #IMAGE49>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s500x400/5e9ebf43b17ed933fa24046b/asset-24x-20230919032020-ho-s9.png");
    }

    #IMAGE120,
    #IMAGE120>.ladi-image>.ladi-image-background {
        width: 59.4887px;
        height: 48.2467px;
    }

    #IMAGE120>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x350/5e9ebf43b17ed933fa24046b/logo-nutricare-2021-16-20210508045839.png");
    }

    #IMAGE122,
    #IMAGE122>.ladi-image>.ladi-image-background {
        width: 57.0038px;
        height: 22.5003px;
    }

    #IMAGE121,
    #IMAGE121>.ladi-image>.ladi-image-background {
        width: 57.0038px;
        height: 23.5017px;
    }

    #SECTION15>.ladi-section-background,
    #SECTION16>.ladi-section-background,
    #SECTION17>.ladi-section-background,
    #SECTION18>.ladi-section-background,
    #SECTION19>.ladi-section-background,
    #SECTION20>.ladi-section-background,
    #ACCORDION_MENU26>.ladi-frame-bg>.ladi-frame-background,
    #ACCORDION_MENU18>.ladi-frame-bg>.ladi-frame-background,
    #ACCORDION_MENU28>.ladi-frame-bg>.ladi-frame-background,
    #ACCORDION_MENU30>.ladi-frame-bg>.ladi-frame-background,
    #SECTION21>.ladi-section-background,
    #SECTION23>.ladi-section-background,
    #SECTION24>.ladi-section-background,
    #SECTION3>.ladi-section-background,
    #SECTION4>.ladi-section-background,
    #SECTION5>.ladi-section-background,
    #SECTION7>.ladi-section-background,
    #SECTION8>.ladi-section-background,
    #SECTION10>.ladi-section-background {
        background-size: cover;
        background-origin: content-box;
        background-position: 50% 0%;
        background-repeat: repeat;
        background-attachment: scroll;
    }

    #VIDEO9>.ladi-video>.ladi-video-background,
    #video-2>.ladi-video>.ladi-video-background {
        background-image: url("../img.youtube.com/vi/qNEW-CsmyoY/hqdefault.jpg");
        background-size: cover;
        background-origin: content-box;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-attachment: scroll;
        opacity: 0;
    }

    #SHAPE9,
    #SHAPE10,
    #SHAPE11 {
        width: 40px;
        height: 40px;
    }

    #SHAPE9 svg:last-child,
    #SHAPE10 svg:last-child,
    #SHAPE11 svg:last-child,
    #SHAPE1 svg:last-child {
        fill: rgba(0, 0, 0, 0.5);
    }

    #VIDEO10,
    #IMAGE94,
    #TABLE11,
    #TABLE10,
    #ACCORDION_CONTENT39,
    #IMAGE73,
    #TABLE2,
    #TABLE5,
    #BUTTON7,
    #ACCORDION_CONTENT1,
    #CAROUSEL1,
    #IMAGE25,
    #SHAPE36,
    #SHAPE37,
    #SHAPE38,
    #SHAPE39,
    #SHAPE40,
    #HEADLINE47 {
        left: 0px;
    }

    #VIDEO10>.ladi-video>.ladi-video-background,
    #VIDEO1>.ladi-video>.ladi-video-background {
        background-size: cover;
        background-origin: content-box;
        background-position: 50% 50%;
        background-repeat: no-repeat;
        background-attachment: scroll;
    }

    #IMAGE86,
    #IMAGE86>.ladi-image>.ladi-image-background {
        width: 279.862px;
        height: 50.5897px;
    }

    #IMAGE86>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/hnkmobile1-022-03-20230919083425-jwvff.png");
    }

    #IMAGE87>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-24x-20230919032020-ho-s9.png");
    }

    #IMAGE88,
    #IMAGE88>.ladi-image>.ladi-image-background {
        width: 200px;
        height: 38.85px;
    }

    #IMAGE88>.ladi-image>.ladi-image-background,
    #IMAGE1>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-14x-20230919071427-ibbbg.png");
    }

    #IMAGE89,
    #IMAGE89>.ladi-image>.ladi-image-background {
        width: 123px;
        height: 123px;
    }

    #IMAGE89>.ladi-image>.ladi-image-background,
    #IMAGE2>.ladi-image>.ladi-image-background,
    #IMAGE26>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-24x-20230919071524-raa73.png");
    }

    #IMAGE90>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s450x450/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
    }

    #IMAGE52,
    #IMAGE52>.ladi-image>.ladi-image-background {
        width: 409.415px;
        height: 103.617px;
    }

    #IMAGE52>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s750x450/5e9ebf43b17ed933fa24046b/asset-2updadcssddsssdtes-20231115021839-8an1w.png");
    }

    #IMAGE53,
    #IMAGE53>.ladi-image>.ladi-image-background {
        width: 348.144px;
        height: 98.7005px;
    }

    #IMAGE53>.ladi-image>.ladi-image-background,
    #IMAGE6>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-3dgf-20240122081659-nlfwb.png");
    }

    #IMAGE54,
    #IMAGE54>.ladi-image>.ladi-image-background {
        width: 219.174px;
        height: 220.05px;
    }

    #IMAGE54>.ladi-image>.ladi-image-background,
    #IMAGE5>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-74x-20230919072108-itryx.png");
    }

    #IMAGE54.ladi-animation>.ladi-image,
    #IMAGE8.ladi-animation>.ladi-image {
        animation-name: bounce;
        animation-delay: 0s;
        animation-duration: 4s;
        animation-iteration-count: infinite;
    }

    #BUTTON33>.ladi-button>.ladi-button-background,
    #ACCORDION_MENU40>.ladi-frame-bg>.ladi-frame-background,
    #BUTTON27>.ladi-button>.ladi-button-background,
    #BUTTON32>.ladi-button>.ladi-button-background,
    #ACCORDION_MENU2>.ladi-frame-bg>.ladi-frame-background,
    #BUTTON2>.ladi-button>.ladi-button-background {
        background-color: rgb(216, 0, 133);
    }

    #BUTTON33>.ladi-button {
        border-width: 1px;
        border-radius: 16px;
        border-style: solid;
        border-color: rgb(255, 189, 89);
    }

    #BUTTON_TEXT33,
    #BUTTON_TEXT23,
    #BUTTON_TEXT22,
    #BUTTON_TEXT27,
    #BUTTON_TEXT3,
    #BUTTON_TEXT7,
    #BUTTON_TEXT2,
    #BUTTON_TEXT10,
    #BUTTON_TEXT11,
    #BUTTON_TEXT12,
    #BUTTON_TEXT13,
    #BUTTON_TEXT14,
    #BUTTON_TEXT15,
    #BUTTON_TEXT16,
    #BUTTON_TEXT17,
    #BUTTON_TEXT18,
    #BUTTON_TEXT19,
    #BUTTON_TEXT20,
    #BUTTON_TEXT21,
    #BUTTON_TEXT28,
    #BUTTON_TEXT29,
    #BUTTON_TEXT30,
    #BUTTON_TEXT31 {
        top: 9px;
        left: 0px;
    }

    #BUTTON_TEXT33>.ladi-headline {
        font-weight: bold;
        line-height: 1.6;
        color: rgb(241, 243, 244);
        text-align: center;
    }

    #SHAPE28,
    #SHAPE29 {
        width: 12.1032px;
        height: 13.7913px;
    }

    #SHAPE28 svg:last-child,
    #ACCORDION_SHAPE16 svg:last-child,
    #SHAPE21 svg:last-child,
    #SHAPE22 svg:last-child,
    #ACCORDION_SHAPE1 svg:last-child,
    #SHAPE36 svg:last-child,
    #SHAPE37 svg:last-child,
    #SHAPE38 svg:last-child,
    #SHAPE39 svg:last-child,
    #SHAPE40 svg:last-child {
        fill: rgb(255, 255, 255);
    }

    #SHAPE29 svg:last-child {
        fill: rgb(254, 254, 254);
    }

    #IMAGE56>.ladi-image>.ladi-image-background,
    #IMAGE7>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/final_expand111-03-20230919072539-irwjd.png");
    }

    #IMAGE57,
    #IMAGE57>.ladi-image>.ladi-image-background {
        width: 147.825px;
        height: 183.302px;
    }

    #IMAGE57>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s450x500/5e9ebf43b17ed933fa24046b/asset-7-20230915073017-e5s83.png");
    }

    #IMAGE57.ladi-animation>.ladi-image {
        animation-name: bounce;
        animation-delay: 1s;
        animation-duration: 4s;
        animation-iteration-count: infinite;
    }

    #ACCORDION_CONTENT25,
    #ACCORDION_CONTENT17,
    #ACCORDION_CONTENT27,
    #ACCORDION_CONTENT29,
    #ACCORDION_CONTENT39,
    #ACCORDION_CONTENT1,
    #IMAGE132 {
        display: none !important;
    }

    #ACCORDION_CONTENT25>.ladi-frame-bg>.ladi-frame-background,
    #ACCORDION_CONTENT17>.ladi-frame-bg>.ladi-frame-background,
    #ACCORDION_CONTENT27>.ladi-frame-bg>.ladi-frame-background,
    #ACCORDION_CONTENT29>.ladi-frame-bg>.ladi-frame-background,
    #BUTTON23>.ladi-button>.ladi-button-background,
    #BUTTON22>.ladi-button>.ladi-button-background,
    #BOX7>.ladi-box,
    #TABLE11 table tbody tr:nth-of-type(even) td,
    #TABLE11 table tbody tr:nth-of-type(odd) td,
    #TABLE10 table tbody tr:nth-of-type(even) td,
    #TABLE10 table tbody tr:nth-of-type(odd) td,
    #ACCORDION_CONTENT39>.ladi-frame-bg>.ladi-frame-background,
    #BOX1>.ladi-box,
    #TABLE2 table tbody tr:nth-of-type(even) td,
    #TABLE2 table tbody tr:nth-of-type(odd) td,
    #TABLE5 table tbody tr:nth-of-type(even) td,
    #BUTTON3>.ladi-button>.ladi-button-background,
    #FORM2 .ladi-form-item-background,
    #POPUP2>.ladi-popup>.ladi-popup-background,
    #POPUP3>.ladi-popup>.ladi-popup-background,
    #POPUP4>.ladi-popup>.ladi-popup-background,
    #POPUP5>.ladi-popup>.ladi-popup-background,
    #POPUP6>.ladi-popup>.ladi-popup-background,
    #POPUP7>.ladi-popup>.ladi-popup-background,
    #POPUP8>.ladi-popup>.ladi-popup-background,
    #POPUP9>.ladi-popup>.ladi-popup-background,
    #POPUP10>.ladi-popup>.ladi-popup-background,
    #POPUP11>.ladi-popup>.ladi-popup-background,
    #POPUP12>.ladi-popup>.ladi-popup-background,
    #POPUP13>.ladi-popup>.ladi-popup-background {
        background-color: rgb(255, 255, 255);
    }

    #IMAGE95,
    #IMAGE95>.ladi-image>.ladi-image-background {
        width: 338.92px;
        height: 185px;
    }

    #IMAGE95,
    #ACCORDION3,
    #IMAGE96,
    #TABLE11 .ladi-table thead td,
    #TABLE10 .ladi-table thead td,
    #IMAGE72,
    #TABLE2 .ladi-table thead td,
    #TABLE5 .ladi-table thead td,
    #IMAGE92,
    #IMAGE24,
    #HEADLINE71,
    #HEADLINE72 {
        top: 0px;
    }

    #IMAGE95>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/landing-haniekid-01234-0521-2-0622-06-20230919085545-wixdh.png");
    }

    #ACCORDION_SHAPE13>.ladi-shape,
    #ACCORDION_SHAPE9>.ladi-shape,
    #ACCORDION_SHAPE14>.ladi-shape,
    #ACCORDION_SHAPE15>.ladi-shape {
        width: 18px;
        height: 18px;
    }

    #IMAGE94,
    #IMAGE94>.ladi-image>.ladi-image-background {
        width: 327.75px;
        height: 156.669px;
    }

    #IMAGE94>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/landing-haniekid-01234-0521-2-0622-062-06-20230919085545-nwk8f.png");
    }

    #IMAGE96>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/landing-haniekid-01234-0521-2-06-20230919085545-zyqjf.png");
    }

    #IMAGE97,
    #IMAGE97>.ladi-image>.ladi-image-background {
        width: 332.436px;
        height: 113.228px;
    }

    #IMAGE97>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/landing-haniekid-01234-0521-06-20230919085545-dfdgm.png");
    }

    #BUTTON23>.ladi-button {
        border-width: 1px;
        border-top-left-radius: 0px;
        border-top-right-radius: 10px;
        border-bottom-right-radius: 10px;
        border-style: groove;
        border-color: rgb(203, 202, 202);
    }

    #BUTTON23>.ladi-button:hover,
    #BUTTON22>.ladi-button:hover,
    #BOX7>.ladi-box:hover,
    #BOX9>.ladi-box:hover,
    #CAROUSEL_ITEM43>.ladi-frame:hover,
    #CAROUSEL_ITEM43>.ladi-frame:hover~.ladi-frame-bg,
    #CAROUSEL_ITEM44>.ladi-frame:hover,
    #CAROUSEL_ITEM44>.ladi-frame:hover~.ladi-frame-bg,
    #CAROUSEL_ITEM45>.ladi-frame:hover,
    #CAROUSEL_ITEM45>.ladi-frame:hover~.ladi-frame-bg,
    #BOX1>.ladi-box:hover,
    #BUTTON3>.ladi-button:hover,
    #BUTTON7>.ladi-button:hover,
    #CAROUSEL_ITEM5>.ladi-frame:hover,
    #CAROUSEL_ITEM5>.ladi-frame:hover~.ladi-frame-bg,
    #CAROUSEL_ITEM6>.ladi-frame:hover,
    #CAROUSEL_ITEM6>.ladi-frame:hover~.ladi-frame-bg,
    #CAROUSEL_ITEM2>.ladi-frame:hover,
    #CAROUSEL_ITEM2>.ladi-frame:hover~.ladi-frame-bg,
    #BOX2>.ladi-box:hover,
    #HEADLINE68>.ladi-headline:hover,
    #IMAGE130:hover>.ladi-image,
    #IMAGE131:hover>.ladi-image,
    #IMAGE132:hover>.ladi-image,
    #IMAGE133:hover>.ladi-image,
    #IMAGE134:hover>.ladi-image,
    #BUTTON10>.ladi-button:hover,
    #BUTTON_TEXT10>.ladi-headline:hover,
    #BUTTON11>.ladi-button:hover,
    #BUTTON_TEXT11>.ladi-headline:hover,
    #HEADLINE23>.ladi-headline:hover,
    #HEADLINE24>.ladi-headline:hover,
    #BUTTON12>.ladi-button:hover,
    #BUTTON_TEXT12>.ladi-headline:hover,
    #BUTTON13>.ladi-button:hover,
    #BUTTON_TEXT13>.ladi-headline:hover,
    #HEADLINE27>.ladi-headline:hover,
    #HEADLINE28>.ladi-headline:hover,
    #BUTTON14>.ladi-button:hover,
    #BUTTON_TEXT14>.ladi-headline:hover,
    #BUTTON15>.ladi-button:hover,
    #BUTTON_TEXT15>.ladi-headline:hover,
    #HEADLINE31>.ladi-headline:hover,
    #HEADLINE32>.ladi-headline:hover,
    #BUTTON16>.ladi-button:hover,
    #BUTTON_TEXT16>.ladi-headline:hover,
    #BUTTON17>.ladi-button:hover,
    #BUTTON_TEXT17>.ladi-headline:hover,
    #HEADLINE33>.ladi-headline:hover,
    #HEADLINE34>.ladi-headline:hover,
    #BUTTON18>.ladi-button:hover,
    #BUTTON_TEXT18>.ladi-headline:hover,
    #BUTTON19>.ladi-button:hover,
    #BUTTON_TEXT19>.ladi-headline:hover,
    #HEADLINE35>.ladi-headline:hover,
    #HEADLINE36>.ladi-headline:hover,
    #BUTTON20>.ladi-button:hover,
    #BUTTON_TEXT20>.ladi-headline:hover,
    #BUTTON21>.ladi-button:hover,
    #BUTTON_TEXT21>.ladi-headline:hover,
    #HEADLINE37>.ladi-headline:hover,
    #HEADLINE38>.ladi-headline:hover,
    #BUTTON28>.ladi-button:hover,
    #BUTTON_TEXT28>.ladi-headline:hover,
    #BUTTON29>.ladi-button:hover,
    #BUTTON_TEXT29>.ladi-headline:hover,
    #HEADLINE50>.ladi-headline:hover,
    #HEADLINE51>.ladi-headline:hover,
    #BUTTON30>.ladi-button:hover,
    #BUTTON_TEXT30>.ladi-headline:hover,
    #BUTTON31>.ladi-button:hover,
    #BUTTON_TEXT31>.ladi-headline:hover,
    #HEADLINE52>.ladi-headline:hover,
    #HEADLINE53>.ladi-headline:hover {
        opacity: 1;
    }

    #BUTTON23>.ladi-button:hover .ladi-button-background,
    #BUTTON22>.ladi-button:hover .ladi-button-background,
    #BUTTON3>.ladi-button:hover .ladi-button-background,
    #BUTTON7>.ladi-button:hover .ladi-button-background {
        background-image: none !important;
        background-color: rgb(216, 0, 133) !important;
        background-size: initial !important;
        background-origin: initial !important;
        background-position: initial !important;
        background-repeat: initial !important;
        background-attachment: initial !important;
        -webkit-background-clip: initial !important;
    }

    #BUTTON_TEXT23 {
        width: 103px;
    }

    #BUTTON_TEXT23>.ladi-headline,
    #BUTTON_TEXT22>.ladi-headline {
        font-weight: bold;
        line-height: 1.6;
        color: rgb(84, 84, 84);
        text-align: center;
    }

    #BUTTON22>.ladi-button {
        border-width: 1px;
        border-radius: 10px 0px 0px 10px;
        border-style: groove;
        border-color: rgb(203, 202, 202);
    }

    #BUTTON_TEXT22 {
        width: 110px;
    }

    #BOX7>.ladi-box,
    #BOX1>.ladi-box {
        border-width: 7px;
        border-radius: 10px;
        border-color: rgb(255, 102, 196);
        box-shadow: rgb(255, 102, 196) 0px 15px 20px -15px;
    }

    #TAB_ITEM36>.ladi-frame-bg>.ladi-frame-background,
    #TAB_ITEM35>.ladi-frame-bg>.ladi-frame-background,
    #TAB_ITEM1_HN2>.ladi-frame-bg>.ladi-frame-background,
    #TAB_ITEM1_HNSBPS>.ladi-frame-bg>.ladi-frame-background,
    #TABLE5 table tbody tr:nth-of-type(odd) td {
        background-color: rgb(251, 251, 251);
    }

    #TAB_ITEM36>.ladi-frame,
    #TAB_ITEM35>.ladi-frame,
    #TAB_ITEM1_HN2>.ladi-frame,
    #TAB_ITEM1_HNSBPS>.ladi-frame {
        border-radius: 3px;
    }

    #TABLE11>.ladi-table,
    #TABLE10>.ladi-table {
        line-height: 1.6;
    }

    #TABLE11 table,
    #TABLE10 table,
    #TABLE2 table,
    #TABLE5 table {
        border-width: 1px;
        border-color: rgb(28, 0, 194);
    }

    #TABLE11 table tbody tr:nth-of-type(even) td,
    #TABLE11 table tbody tr:nth-of-type(odd) td,
    #TABLE10 table tbody tr:nth-of-type(even) td,
    #TABLE10 table tbody tr:nth-of-type(odd) td,
    #TABLE2 table tbody tr:nth-of-type(even) td,
    #TABLE2 table tbody tr:nth-of-type(odd) td,
    #TABLE5 table tbody tr:nth-of-type(even) td,
    #TABLE5 table tbody tr:nth-of-type(odd) td {
        color: rgb(0, 0, 0);
    }

    #TABLE11 table tbody tr:nth-of-type(even) td,
    #TABLE11 table tbody tr:nth-of-type(odd) td,
    #TABLE11 table thead td,
    #TABLE11 table tbody tr td:first-child,
    #TABLE10 table tbody tr:nth-of-type(even) td,
    #TABLE10 table tbody tr:nth-of-type(odd) td,
    #TABLE10 table thead td,
    #TABLE10 table tbody tr td:first-child,
    #TABLE2 table tbody tr:nth-of-type(even) td,
    #TABLE2 table tbody tr:nth-of-type(odd) td,
    #TABLE2 table thead td,
    #TABLE2 table tbody tr td:first-child,
    #TABLE5 table tbody tr:nth-of-type(even) td,
    #TABLE5 table tbody tr:nth-of-type(odd) td,
    #TABLE5 table thead td,
    #TABLE5 table tbody tr td:first-child {
        padding: 10px;
    }

    #TABLE11 table td,
    #TABLE10 table td,
    #TABLE2 table td,
    #TABLE5 table td {
        border-width: 1px;
        border-style: solid;
        border-color: rgb(241, 243, 244);
    }

    #TABLE11 table thead td,
    #TABLE10 table thead td,
    #TABLE2 table thead td,
    #TABLE5 table thead td {
        color: rgb(216, 0, 133);
    }

    #TABLE11 .ladi-table thead td,
    #TABLE10 .ladi-table thead td,
    #TABLE2 .ladi-table thead td,
    #TABLE5 .ladi-table thead td {
        font-weight: bold;
        position: sticky;
    }

    #TABLE11 .ladi-table table,
    #TABLE10 .ladi-table table,
    #TABLE2 .ladi-table table,
    #TABLE5 .ladi-table table {
        min-width: 0px;
    }

    #IMAGE67,
    #IMAGE67>.ladi-image>.ladi-image-background {
        width: 259.412px;
        height: 27.6561px;
    }

    #IMAGE67>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s600x350/5e9ebf43b17ed933fa24046b/asset-102x-20230918074329-9uxul.png");
    }

    #IMAGE93,
    #IMAGE93>.ladi-image>.ladi-image-background {
        width: 393.324px;
    }

    #ACCORDION_MENU40>.ladi-frame,
    #ACCORDION_MENU2>.ladi-frame {
        border-radius: 10px;
    }

    #HEADLINE41>.ladi-headline {
        font-size: 16px;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(255, 255, 255);
    }

    #BOX9>.ladi-box {
        border-radius: 76px;
    }

    #BOX9>.ladi-box,
    #BOX8>.ladi-box {
        background-color: rgb(255, 232, 187);
    }

    #IMAGE109>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s450x500/5e9ebf43b17ed933fa24046b/final_expand222-07-20230921020323-kjavs.png");
    }

    #IMAGE68,
    #IMAGE68>.ladi-image>.ladi-image-background {
        height: 22.8254px;
    }

    #IMAGE68>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s600x350/5e9ebf43b17ed933fa24046b/asset-19-20230915083640-kudus.png");
    }

    #IMAGE91,
    #IMAGE91>.ladi-image>.ladi-image-background {
        width: 298px;
        height: 18.1594px;
    }

    #IMAGE91>.ladi-image>.ladi-image-background,
    #IMAGE15>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-84x-20230919073249-khspo.png");
    }

    #IMAGE107>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s450x500/5e9ebf43b17ed933fa24046b/final_expand-06-20230921020323-cgz_4.png");
    }

    #IMAGE108>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s450x500/5e9ebf43b17ed933fa24046b/final_expand-07-20230921020323-svhnz.png");
    }

    #HEADLINE46>.ladi-headline,
    #HEADLINE45>.ladi-headline {
        line-height: 1.6;
        color: rgb(146, 86, 26);
        text-align: left;
    }

    #BUTTON27>.ladi-button {
        border-radius: 25px;
    }

    #BUTTON_TEXT27 {
        width: 280px;
    }

    #BUTTON_TEXT27>.ladi-headline {
        font-family: TWudHNlcnJhdCWYXJpYWJsZUZvbnRfddodCdGY;
        line-height: 1.6;
        color: rgb(241, 243, 244);
        text-align: center;
    }

    #IMAGE105>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s500x550/5e9ebf43b17ed933fa24046b/asset-93x-20230921021426-t_b-z.png");
    }

    #CAROUSEL8 .ladi-carousel .ladi-carousel-content,
    #CAROUSEL1 .ladi-carousel .ladi-carousel-content {
        width: 959px;
    }

    #CAROUSEL_ITEM43,
    #CAROUSEL_ITEM44,
    #CAROUSEL_ITEM45 {
        width: 313px;
    }

    #CAROUSEL_ITEM43>.ladi-frame-bg>.ladi-frame-background,
    #CAROUSEL_ITEM44>.ladi-frame-bg>.ladi-frame-background,
    #CAROUSEL_ITEM45>.ladi-frame-bg>.ladi-frame-background,
    #CAROUSEL_ITEM5>.ladi-frame-bg>.ladi-frame-background,
    #CAROUSEL_ITEM6>.ladi-frame-bg>.ladi-frame-background,
    #CAROUSEL_ITEM2>.ladi-frame-bg>.ladi-frame-background {
        background-color: rgba(244, 244, 244, 0);
    }

    #IMAGE71,
    #IMAGE71>.ladi-image>.ladi-image-background,
    #IMAGE23,
    #IMAGE23>.ladi-image>.ladi-image-background {
        width: 290.304px;
    }

    #IMAGE71,
    #IMAGE23 {
        top: -3px;
        left: 13px;
    }

    #IMAGE71>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s600x650/5e9ebf43b17ed933fa24046b/asset-114x-20230919080708-qeirx.png");
    }

    #IMAGE71:hover>.ladi-image,
    #IMAGE72:hover>.ladi-image,
    #IMAGE73:hover>.ladi-image,
    #IMAGE4:hover>.ladi-image,
    #IMAGE5:hover>.ladi-image,
    #IMAGE9:hover>.ladi-image,
    #IMAGE10:hover>.ladi-image,
    #IMAGE12:hover>.ladi-image,
    #IMAGE11:hover>.ladi-image,
    #IMAGE16:hover>.ladi-image,
    #IMAGE23:hover>.ladi-image,
    #IMAGE24:hover>.ladi-image,
    #IMAGE25:hover>.ladi-image {
        transform: scale(1.02);
        opacity: 1;
    }

    #CAROUSEL_ITEM44,
    #CAROUSEL_ITEM6 {
        top: 0px;
        left: 323px;
    }

    #IMAGE72>.ladi-image>.ladi-image-background,
    #IMAGE24>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s600x650/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web4343-06-20240529091046-zo5_i.png");
    }

    #CAROUSEL_ITEM45,
    #CAROUSEL_ITEM2 {
        top: 0px;
        left: 646px;
    }

    #IMAGE74,
    #IMAGE74>.ladi-image>.ladi-image-background {
        width: 308.682px;
        height: 17.0414px;
    }

    #IMAGE74>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s650x350/5e9ebf43b17ed933fa24046b/asset-39-20230915095934-ya1wt.png");
    }

    #SECTION2>.ladi-section-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web5435436-20240529061636-bsatf.png");
        background-size: cover;
        background-origin: content-box;
        background-position: 50% 0%;
        background-repeat: repeat;
        background-attachment: scroll;
    }

    #VIDEO1>.ladi-video {
        box-shadow: rgb(0, 0, 0) 0px 15px 20px -15px;
    }

    #IMAGE2,
    #IMAGE2>.ladi-image>.ladi-image-background {
        width: 348px;
        height: 348px;
    }

    #IMAGE2:hover>.ladi-image,
    #IMAGE26:hover>.ladi-image {
        transform: scale(1.05);
        opacity: 1;
    }

    #IMAGE4>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-2updadcssddsssdtes-20231115021839-8an1w.png");
    }

    #GROUP32,
    #BUTTON32 {
        width: 428px;
        height: 35.921px;
    }

    #BUTTON32>.ladi-button {
        border-width: 1px;
        border-radius: 17px;
        border-style: solid;
        border-color: rgb(255, 189, 89);
    }

    #BUTTON_TEXT32 {
        width: 426px;
        top: 10.8048px;
        left: 0px;
    }

    #BUTTON_TEXT32>.ladi-headline,
    #BUTTON_TEXT10>.ladi-headline,
    #BUTTON_TEXT11>.ladi-headline,
    #BUTTON_TEXT12>.ladi-headline,
    #BUTTON_TEXT13>.ladi-headline,
    #BUTTON_TEXT14>.ladi-headline,
    #BUTTON_TEXT15>.ladi-headline,
    #BUTTON_TEXT16>.ladi-headline,
    #BUTTON_TEXT17>.ladi-headline,
    #BUTTON_TEXT18>.ladi-headline,
    #BUTTON_TEXT19>.ladi-headline,
    #BUTTON_TEXT20>.ladi-headline,
    #BUTTON_TEXT21>.ladi-headline,
    #BUTTON_TEXT28>.ladi-headline,
    #BUTTON_TEXT29>.ladi-headline,
    #BUTTON_TEXT30>.ladi-headline,
    #BUTTON_TEXT31>.ladi-headline {
        font-size: 14px;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(255, 255, 255);
        text-align: center;
    }

    #SHAPE21 {
        width: 16.8129px;
        height: 22.9996px;
        top: 6.46124px;
        left: 39.89px;
    }

    #SHAPE22 {
        width: 16.8819px;
        height: 23.094px;
        top: 7.10833px;
        left: 365.89px;
    }

    #SECTION6>.ladi-section-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/final_expand12346-20230915072937-h5hg9.png");
        background-size: cover;
        background-origin: content-box;
        background-position: 50% 0%;
        background-repeat: repeat;
        background-attachment: scroll;
    }

    #IMAGE9,
    #IMAGE9>.ladi-image>.ladi-image-background {
        height: 232.28px;
    }

    #IMAGE10,
    #IMAGE10>.ladi-image>.ladi-image-background {
        width: 311.255px;
        height: 232.28px;
    }

    #IMAGE10>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/icon-06-20230919081623-mamk3.png");
    }

    #IMAGE12,
    #IMAGE12>.ladi-image>.ladi-image-background {
        width: 307.826px;
    }

    #IMAGE11,
    #IMAGE11>.ladi-image>.ladi-image-background {
        width: 309.524px;
    }

    #IMAGE11>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s650x500/5e9ebf43b17ed933fa24046b/icon-062-063-06-20230919081927-sqqzc.png");
    }

    #TABLE2>.ladi-table,
    #TABLE5>.ladi-table {
        line-height: 1.6;
        text-align: center;
    }

    #BUTTON3>.ladi-button {
        border-width: 1px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        border-style: groove;
        border-color: rgb(203, 202, 202);
    }

    #BUTTON_TEXT3,
    #BUTTON_TEXT7 {
        width: 138px;
    }

    #BUTTON_TEXT3>.ladi-headline,
    #BUTTON_TEXT7>.ladi-headline {
        font-family: TWudHNlcnJhdCWYXJpYWJsZUZvbnRfddodCdGY;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(84, 84, 84);
        text-align: center;
    }

    #BUTTON7>.ladi-button>.ladi-button-background,
    #ACCORDION_CONTENT1>.ladi-frame-bg>.ladi-frame-background {
        background-color: rgb(254, 254, 254);
    }

    #BUTTON7>.ladi-button {
        border-width: 1px;
        border-radius: 0px 0px 10px 10px;
        border-style: groove;
        border-color: rgb(203, 202, 202);
    }

    #IMAGE75,
    #IMAGE75>.ladi-image>.ladi-image-background {
        width: 200px;
        height: 228.07px;
    }

    #IMAGE75>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s550x550/5e9ebf43b17ed933fa24046b/asset-34-20230918082829-oxwp_.png");
    }

    #IMAGE77,
    #IMAGE77>.ladi-image>.ladi-image-background {
        width: 382.642px;
        height: 41.9008px;
    }

    #IMAGE77>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s700x350/5e9ebf43b17ed933fa24046b/asset-52x-20230918083120-nfg6c.png");
    }

    #SECTION9>.ladi-section-background {
        background-color: rgb(255, 249, 251);
    }

    #ACCORDION1,
    #ACCORDION_MENU2 {
        width: 883.5px;
    }

    #ACCORDION_SHAPE1,
    #ACCORDION_SHAPE1>.ladi-shape {
        left: 822.16px;
    }

    #ACCORDION_SHAPE1>.ladi-shape {
        width: 29px;
    }

    #HEADLINE3 {
        width: 368px;
        left: 34.436px;
    }

    #HEADLINE3>.ladi-headline {
        font-size: 16px;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(255, 255, 255);
        text-align: left;
    }

    #IMAGE103,
    #IMAGE103>.ladi-image>.ladi-image-background {
        width: 2097.79px;
        height: 337.7px;
    }

    #IMAGE103>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s2400x650/5e9ebf43b17ed933fa24046b/final_expand4545-09-20230921021337-gg4zr.png");
    }

    #IMAGE98,
    #IMAGE98>.ladi-image>.ladi-image-background,
    #IMAGE99,
    #IMAGE99>.ladi-image>.ladi-image-background,
    #IMAGE100,
    #IMAGE100>.ladi-image>.ladi-image-background {
        width: 227.987px;
        height: 360.218px;
    }

    #IMAGE98>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/final_expand222-07-20230921020323-kjavs.png");
    }

    #IMAGE99>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/final_expand-07-20230921020323-svhnz.png");
    }

    #IMAGE100>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/final_expand-06-20230921020323-cgz_4.png");
    }

    #BOX8>.ladi-box {
        border-radius: 63px;
    }

    #SECTION11>.ladi-section-background,
    #SECTION12>.ladi-section-background {
        background-color: rgb(255, 242, 247);
    }

    #CAROUSEL1 {
        height: 306px;
    }

    #CAROUSEL_ITEM5,
    #CAROUSEL_ITEM6,
    #CAROUSEL_ITEM2 {
        width: 313px;
        height: 306px;
    }

    #IMAGE23>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/raw/5e9ebf43b17ed933fa24046b/asset-114x-20230919080708-qeirx.png");
    }

    #IMAGE27>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s650x650/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
    }

    #GROUP1,
    #BOX2 {
        width: 301.616px;
    }

    #BOX2>.ladi-box {
        border-radius: 15px;
        background-color: rgb(244, 185, 222);
    }

    #FORM2 {
        width: 270px;
        height: 274px;
        top: 73.4px;
        left: 15.808px;
    }

    #FORM2>.ladi-form {
        font-size: 12px;
        line-height: 1.6;
        color: rgb(115, 115, 115);
    }

    #FORM2 .ladi-form .ladi-form-item.ladi-form-checkbox .ladi-form-checkbox-item span[data-checked="false"],
    #FORM2 .ladi-form .ladi-form-item.ladi-form-checkbox .ladi-form-checkbox-item .ladi-editing,
    #FORM2 .ladi-form .ladi-form-item.ladi-form-checkbox .ladi-form-checkbox-item .ladi-editing::placeholder,
    #FORM2 .ladi-form .ladi-survey-option .ladi-survey-option-label,
    #FORM2 .ladi-form-item .ladi-form-control::placeholder,
    #FORM2 .ladi-form-item select.ladi-form-control[data-selected=""] {
        color: rgb(115, 115, 115);
    }

    #FORM2 .ladi-form-item {
        padding-left: 5px;
        padding-right: 5px;
    }

    #FORM2 .ladi-form-item.otp-countdown:before {
        right: 10px;
    }

    #FORM2 .ladi-form-item.ladi-form-checkbox {
        padding-left: 10px;
        padding-right: 10px;
    }

    #FORM2 .ladi-form-item-container .ladi-form-item .ladi-form-control-select {
        background-image: url("data:image/svg+xml;utf8, %3Csvg%20width%3D%2232%22%20height%3D%2224%22%20viewBox%3D%220%200%2032%2024%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cpolygon%20points%3D%220%2C0%2032%2C0%2016%2C24%22%20style%3D%22fill%3A%20rgb(115%2C%20115%2C%20115)%22%3E%3C%2Fpolygon%3E%3C%2Fsvg%3E");
    }

    #FORM2 .ladi-survey-option {
        text-align: left;
    }

    #FORM2 .ladi-form-item-container,
    #FORM2 .ladi-form-label-container .ladi-form-label-item {
        border-width: 0px;
        border-radius: 5px;
        border-style: solid;
        border-color: rgb(241, 243, 244);
    }

    #FORM2 .ladi-form-item-container .ladi-form-quantity .button {
        background-color: rgb(241, 243, 244);
    }

    #FORM2 .ladi-form-item-background {
        border-radius: 5px;
    }

    #BUTTON2 {
        width: 270px;
        height: 40px;
        top: 234px;
        left: 0px;
    }

    #BUTTON2.ladi-animation>.ladi-button {
        animation-name: flash;
        animation-delay: 1s;
        animation-duration: 5s;
        animation-iteration-count: infinite;
    }

    #BUTTON_TEXT2 {
        width: 270px;
    }

    #BUTTON_TEXT2>.ladi-headline {
        font-size: 14px;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(241, 243, 244);
        text-align: center;
    }

    #FORM_ITEM2 {
        width: 270px;
        height: 36px;
    }

    #FORM_ITEM4,
    #FORM_ITEM6 {
        width: 270px;
        height: 35px;
    }

    #FORM_ITEM4 {
        top: 52.5px;
        left: 0px;
    }

    #FORM_ITEM5 {
        width: 270px;
        height: 58px;
        top: 155.5px;
        left: 0px;
    }

    #FORM_ITEM6 {
        top: 104px;
        left: 0px;
    }

    #IMAGE28,
    #IMAGE28>.ladi-image>.ladi-image-background {
        width: 222px;
        height: 26.6154px;
    }

    #IMAGE28 {
        top: 21.092px;
        left: 31.808px;
    }

    #IMAGE28>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s550x350/5e9ebf43b17ed933fa24046b/asset-29-20230915093527-roqo2.png");
    }

    #SECTION27>.ladi-section-background {
        background-color: rgb(3, 78, 162);
    }

    #LINE25>.ladi-line>.ladi-line-container,
    #LINE26>.ladi-line>.ladi-line-container {
        border-top: 1px solid rgb(255, 255, 255);
        border-right: 1px solid rgb(255, 255, 255);
        border-bottom: 1px solid rgb(255, 255, 255);
        border-left: 0px !important;
    }

    #LINE25>.ladi-line,
    #LINE26>.ladi-line,
    #LINE5>.ladi-line,
    #LINE6>.ladi-line,
    #LINE7>.ladi-line,
    #LINE8>.ladi-line,
    #LINE9>.ladi-line,
    #LINE10>.ladi-line,
    #LINE11>.ladi-line,
    #LINE12>.ladi-line,
    #LINE13>.ladi-line,
    #LINE14>.ladi-line,
    #LINE15>.ladi-line,
    #LINE16>.ladi-line,
    #LINE17>.ladi-line,
    #LINE18>.ladi-line,
    #LINE19>.ladi-line,
    #LINE20>.ladi-line {
        width: 100%;
        padding: 8px 0px;
    }

    #HEADLINE68>.ladi-headline {
        font-weight: bold;
        line-height: 1.4;
        color: rgb(255, 255, 255);
        text-shadow: rgb(0, 0, 0) 1px 2px 3px;
    }

    #IMAGE131,
    #IMAGE131>.ladi-image>.ladi-image-background {
        width: 50px;
        height: 50px;
    }

    #IMAGE131 {
        top: 0px;
        left: auto;
        right: 15px;
        bottom: 0px;
        position: fixed;
        z-index: 90000050;
        margin: auto 0px;
        display: none !important;
    }

    #IMAGE131>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x400/5e9ebf43b17ed933fa24046b/mesicon3-20200831073612.png");
    }

    #IMAGE134 {
        top: auto;
        left: auto;
        right: 25px;
        bottom: 30px;
        position: fixed;
        z-index: 90000050;
    }

    #HEADLINE69>.ladi-headline,
    #HEADLINE70>.ladi-headline,
    #HEADLINE71>.ladi-headline,
    #HEADLINE72>.ladi-headline {
        line-height: 1.6;
        color: rgb(255, 255, 255);
        text-align: left;
    }

    #IMAGE136,
    #IMAGE136>.ladi-image>.ladi-image-background {
        width: 60.1143px;
        height: 60.1143px;
    }

    #IMAGE136>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x400/5e9ebf43b17ed933fa24046b/logo-vietnam-value3-20240525022805-rrlq4.png");
    }

    #PARAGRAPH17 {
        top: 0px;
        left: 11px;
    }

    #PARAGRAPH17>.ladi-paragraph {
        line-height: 1.6;
        color: rgb(255, 255, 255);
    }

    #SHAPE36,
    #SHAPE37,
    #SHAPE38,
    #SHAPE39,
    #SHAPE40 {
        width: 7px;
        height: 8.641px;
    }

    #SECTION_POPUP {
        height: 0px;
    }

    #POPUP2,
    #POPUP3,
    #POPUP4,
    #POPUP5,
    #POPUP6,
    #POPUP7,
    #POPUP8,
    #POPUP9,
    #POPUP10,
    #POPUP12,
    #POPUP13,
    #DROPBOX14 {
        right: 0px;
        bottom: 0px;
        margin: auto;
    }

    #POPUP2>.ladi-popup>.ladi-overlay,
    #POPUP2>.ladi-popup>.ladi-popup-background,
    #POPUP3>.ladi-popup>.ladi-overlay,
    #POPUP3>.ladi-popup>.ladi-popup-background,
    #POPUP4>.ladi-popup>.ladi-overlay,
    #POPUP4>.ladi-popup>.ladi-popup-background,
    #POPUP5>.ladi-popup>.ladi-overlay,
    #POPUP5>.ladi-popup>.ladi-popup-background,
    #POPUP6>.ladi-popup>.ladi-overlay,
    #POPUP6>.ladi-popup>.ladi-popup-background,
    #POPUP7>.ladi-popup>.ladi-overlay,
    #POPUP7>.ladi-popup>.ladi-popup-background,
    #POPUP12>.ladi-popup>.ladi-overlay,
    #POPUP12>.ladi-popup>.ladi-popup-background,
    #POPUP13>.ladi-popup>.ladi-overlay,
    #POPUP13>.ladi-popup>.ladi-popup-background {
        border-radius: 27px;
    }

    #POPUP2>.ladi-popup,
    #POPUP3>.ladi-popup,
    #POPUP4>.ladi-popup,
    #POPUP5>.ladi-popup,
    #POPUP6>.ladi-popup,
    #POPUP7>.ladi-popup,
    #POPUP12>.ladi-popup,
    #POPUP13>.ladi-popup {
        border-width: 1px;
        border-radius: 28px;
        border-style: solid;
        border-color: rgb(42, 59, 142);
    }

    #POPUP2 .popup-close,
    #POPUP3 .popup-close,
    #POPUP4 .popup-close,
    #POPUP5 .popup-close,
    #POPUP6 .popup-close,
    #POPUP7 .popup-close,
    #POPUP12 .popup-close,
    #POPUP13 .popup-close {
        display: none;
    }

    #BUTTON10,
    #BUTTON11,
    #BUTTON12,
    #BUTTON13,
    #BUTTON14,
    #BUTTON15,
    #BUTTON16,
    #BUTTON17,
    #BUTTON18,
    #BUTTON19,
    #BUTTON20,
    #BUTTON21,
    #BUTTON28,
    #BUTTON29,
    #BUTTON30,
    #BUTTON31 {
        width: 160px;
        height: 40px;
    }

    #BUTTON10>.ladi-button>.ladi-button-background,
    #BUTTON11>.ladi-button>.ladi-button-background,
    #BUTTON12>.ladi-button>.ladi-button-background,
    #BUTTON13>.ladi-button>.ladi-button-background,
    #BUTTON14>.ladi-button>.ladi-button-background,
    #BUTTON15>.ladi-button>.ladi-button-background,
    #BUTTON16>.ladi-button>.ladi-button-background,
    #BUTTON17>.ladi-button>.ladi-button-background,
    #BUTTON18>.ladi-button>.ladi-button-background,
    #BUTTON19>.ladi-button>.ladi-button-background,
    #BUTTON20>.ladi-button>.ladi-button-background,
    #BUTTON21>.ladi-button>.ladi-button-background,
    #BUTTON28>.ladi-button>.ladi-button-background,
    #BUTTON29>.ladi-button>.ladi-button-background,
    #BUTTON30>.ladi-button>.ladi-button-background,
    #BUTTON31>.ladi-button>.ladi-button-background {
        background-color: rgb(42, 59, 142);
    }

    #BUTTON_TEXT10,
    #BUTTON_TEXT11,
    #BUTTON_TEXT12,
    #BUTTON_TEXT13,
    #BUTTON_TEXT14,
    #BUTTON_TEXT15,
    #BUTTON_TEXT16,
    #BUTTON_TEXT17,
    #BUTTON_TEXT18,
    #BUTTON_TEXT19,
    #BUTTON_TEXT20,
    #BUTTON_TEXT21,
    #BUTTON_TEXT28,
    #BUTTON_TEXT29,
    #BUTTON_TEXT30,
    #BUTTON_TEXT31 {
        width: 160px;
    }

    #LINE5>.ladi-line>.ladi-line-container,
    #LINE6>.ladi-line>.ladi-line-container,
    #LINE7>.ladi-line>.ladi-line-container,
    #LINE8>.ladi-line>.ladi-line-container,
    #LINE9>.ladi-line>.ladi-line-container,
    #LINE10>.ladi-line>.ladi-line-container,
    #LINE11>.ladi-line>.ladi-line-container,
    #LINE12>.ladi-line>.ladi-line-container,
    #LINE13>.ladi-line>.ladi-line-container,
    #LINE14>.ladi-line>.ladi-line-container,
    #LINE15>.ladi-line>.ladi-line-container,
    #LINE16>.ladi-line>.ladi-line-container,
    #LINE17>.ladi-line>.ladi-line-container,
    #LINE18>.ladi-line>.ladi-line-container,
    #LINE19>.ladi-line>.ladi-line-container,
    #LINE20>.ladi-line>.ladi-line-container {
        border-top: 3px solid rgb(42, 59, 142);
        border-right: 3px solid rgb(42, 59, 142);
        border-bottom: 3px solid rgb(42, 59, 142);
        border-left: 0px !important;
    }

    #HEADLINE23>.ladi-headline,
    #HEADLINE27>.ladi-headline,
    #HEADLINE31>.ladi-headline,
    #HEADLINE33>.ladi-headline,
    #HEADLINE35>.ladi-headline,
    #HEADLINE37>.ladi-headline,
    #HEADLINE50>.ladi-headline,
    #HEADLINE52>.ladi-headline {
        font-weight: bold;
        line-height: 1.6;
        color: rgb(42, 59, 142);
        text-align: center;
    }

    #HEADLINE24>.ladi-headline,
    #HEADLINE28>.ladi-headline,
    #HEADLINE32>.ladi-headline,
    #HEADLINE34>.ladi-headline,
    #HEADLINE36>.ladi-headline,
    #HEADLINE38>.ladi-headline,
    #HEADLINE51>.ladi-headline,
    #HEADLINE53>.ladi-headline {
        font-family: TnVcmljYXJlUHJvLVJlZVsYXIudHRm;
        line-height: 1.6;
        color: rgb(0, 0, 0);
        text-align: center;
    }

    #POPUP11 {
        width: 420px;
        right: 0px;
        bottom: auto;
        margin: 0px auto;
    }

    #IMAGE81,
    #IMAGE81>.ladi-image>.ladi-image-background {
        width: 144.014px;
        height: 29.6129px;
    }

    #IMAGE81>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s450x350/5e9ebf43b17ed933fa24046b/asset-31-20230915094627-f60_e.png");
    }

    #IMAGE82,
    #IMAGE82>.ladi-image>.ladi-image-background {
        width: 76.8524px;
        height: 30.318px;
    }

    #IMAGE82>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x350/5e9ebf43b17ed933fa24046b/asset-32-20230915094627-4v12i.png");
    }

    #IMAGE83,
    #IMAGE83>.ladi-image>.ladi-image-background {
        width: 65.5713px;
        height: 31.023px;
    }

    #IMAGE83>.ladi-image>.ladi-image-background {
        background-image: url("../w.ladicdn.com/s400x350/5e9ebf43b17ed933fa24046b/asset-33-20230915094649-a1rkz.png");
    }

    #HEADLINE48 {
        width: 154px;
        top: 11.7165px;
        left: 155px;
    }

    #HEADLINE48>.ladi-headline,
    #HEADLINE49>.ladi-headline {
        font-size: 12px;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(216, 0, 133);
        text-align: center;
    }

    #HEADLINE49 {
        width: 86px;
        top: 11.5px;
        left: 323.652px;
    }

    #DROPBOX14 {
        width: 88px;
        height: 23px;
    }

    #DROPBOX14>.ladi-popup>.ladi-popup-background {
        background-color: rgba(255, 255, 255, 0);
    }

    #HEADLINE55 {
        width: 54px;
        top: 0px;
        left: 32px;
    }

    #HEADLINE55>.ladi-headline {
        font-size: 12px;
        font-weight: bold;
        line-height: 1.6;
        color: rgb(38, 54, 131);
        text-align: right;
    }

    @media (min-width: 768px) {
        #SECTION1 {
            height: 74.3px;
        }

        #IMAGE34,
        #IMAGE34>.ladi-image>.ladi-image-background {
            width: 67.4772px;
            height: 62.1501px;
        }

        #IMAGE34 {
            top: 6.075px;
            left: 3px;
        }

        #IMAGE38,
        #IMAGE38>.ladi-image>.ladi-image-background {
            width: 156.378px;
            height: 45.0885px;
        }

        #IMAGE38 {
            top: 14.1058px;
            left: 707.94px;
        }

        #IMAGE38>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s500x350/5e9ebf43b17ed933fa24046b/343434-03-20240529061843-k8pcn.png");
        }

        #HEADLINE42 {
            top: 12.1501px;
            left: 80px;
        }

        #HEADLINE42>.ladi-headline,
        #HEADLINE43>.ladi-headline,
        #HEADLINE44>.ladi-headline {
            font-size: 16px;
            text-align: center;
        }

        #HEADLINE43 {
            top: 12.1501px;
            left: 288px;
        }

        #HEADLINE44 {
            width: 250px;
            top: 12.1501px;
            left: 476.136px;
        }

        #IMAGE112 {
            top: 37.1501px;
            left: 901.318px;
        }

        #IMAGE111 {
            top: 14.1501px;
            left: 901.318px;
        }

        #SECTION14,
        #SECTION15,
        #SECTION16,
        #SECTION17,
        #SECTION18,
        #SECTION19,
        #SECTION20,
        #SECTION21,
        #SECTION22,
        #SECTION23,
        #SECTION24 {
            height: 662.2px;
        }

        #SECTION14,
        #SECTION15,
        #SECTION16,
        #SECTION17,
        #SECTION18,
        #SECTION19,
        #SECTION20,
        #SECTION21,
        #SECTION22,
        #SECTION23,
        #SECTION24,
        #IMAGE134 {
            display: none !important;
        }

        #SHAPE8,
        #IMAGE49,
        #IMAGE50,
        #IMAGE120,
        #IMAGE122,
        #IMAGE121,
        #IMAGE86,
        #IMAGE87,
        #IMAGE110,
        #IMAGE88,
        #IMAGE89,
        #IMAGE90,
        #IMAGE52,
        #IMAGE53,
        #IMAGE54,
        #BUTTON33,
        #SHAPE28,
        #SHAPE29,
        #IMAGE56,
        #IMAGE57,
        #IMAGE58,
        #ACCORDION7,
        #ACCORDION8,
        #ACCORDION9,
        #BUTTON23,
        #BUTTON22,
        #BOX7,
        #IMAGE67,
        #ACCORDION10,
        #BOX9,
        #IMAGE109,
        #IMAGE68,
        #IMAGE91,
        #IMAGE107,
        #IMAGE108,
        #HEADLINE46,
        #BUTTON27,
        #IMAGE105,
        #IMAGE106,
        #CAROUSEL8,
        #IMAGE74 {
            top: 0px;
            left: 0px;
        }

        #IMAGE49,
        #IMAGE49>.ladi-image>.ladi-image-background {
            width: 153.043px;
        }

        #IMAGE50,
        #IMAGE50>.ladi-image>.ladi-image-background {
            width: 96.6905px;
            height: 31px;
        }

        #IMAGE50>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s400x350/5e9ebf43b17ed933fa24046b/343434-03-20240529061843-k8pcn.png");
        }

        #SECTION15>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web543546734-20240529062903-tgnxx.png");
        }

        #VIDEO9,
        #VIDEO10 {
            width: 400px;
            height: 225px;
        }

        #SHAPE9,
        #SHAPE10 {
            top: 90.5px;
            left: 178px;
        }

        #SECTION16>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/landing-haniekid-0123-20230919083356-lroj8.png");
        }

        #VIDEO10,
        #IMAGE94,
        #HEADLINE47 {
            top: 0px;
        }

        #VIDEO10>.ladi-video>.ladi-video-background {
            background-image: url("../w.ladicdn.com/s400x225/5e9ebf43b17ed933fa24046b/artboard-1-100ssdc-20231010020320-tewxn.jpg");
        }

        #IMAGE87,
        #IMAGE87>.ladi-image>.ladi-image-background {
            width: 127.231px;
            height: 37.8664px;
        }

        #IMAGE110,
        #IMAGE110>.ladi-image>.ladi-image-background,
        #IMAGE84,
        #IMAGE84>.ladi-image>.ladi-image-background {
            width: 288.251px;
            height: 108.691px;
        }

        #IMAGE110>.ladi-image>.ladi-image-background,
        #IMAGE84>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s600x450/5e9ebf43b17ed933fa24046b/asset-144x-20230919082244-nrx9b.png");
        }

        #SECTION17>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/landing-haniekid-01234-052-20230919084356-mkdvd.png");
        }

        #IMAGE90,
        #IMAGE90>.ladi-image>.ladi-image-background {
            width: 123.802px;
            height: 144.6px;
        }

        #SECTION18>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/final_expand_mobie1234-20230918063927-momph.png");
        }

        #BUTTON33,
        #BUTTON27 {
            width: 160px;
            height: 40px;
        }

        #BUTTON_TEXT33 {
            width: 254px;
        }

        #BUTTON_TEXT33>.ladi-headline,
        #BUTTON_TEXT27>.ladi-headline,
        #TABLE2>.ladi-table,
        #TABLE5>.ladi-table,
        #HEADLINE45>.ladi-headline {
            font-size: 14px;
        }

        #SECTION19>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/final_expand_mobie12345-20230918064815-ljvpt.png");
        }

        #IMAGE56,
        #IMAGE56>.ladi-image>.ladi-image-background {
            width: 164.379px;
            height: 64.6047px;
        }

        #IMAGE58,
        #IMAGE58>.ladi-image>.ladi-image-background {
            width: 221.226px;
            height: 281.4px;
        }

        #IMAGE58>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s550x600/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
        }

        #SECTION20>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/final_expand_mobie123456-20230918065310-bf_62.png");
        }

        #ACCORDION7,
        #ACCORDION_MENU26,
        #ACCORDION3,
        #ACCORDION_MENU18,
        #ACCORDION8,
        #ACCORDION_MENU28,
        #ACCORDION9,
        #ACCORDION_MENU30 {
            width: 410.5px;
            height: 41px;
        }

        #ACCORDION_CONTENT25,
        #ACCORDION_CONTENT17,
        #ACCORDION_CONTENT27,
        #ACCORDION_CONTENT29 {
            width: 410.5px;
            height: 150px;
            top: 51px;
            left: 0px;
        }

        #IMAGE95,
        #ACCORDION3,
        #IMAGE96 {
            left: 0px;
        }

        #ACCORDION_MENU26>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s410x41/5e9ebf43b17ed933fa24046b/asset-72x-20230918065342-bnsja.png");
        }

        #ACCORDION_SHAPE13,
        #ACCORDION_SHAPE13>.ladi-shape,
        #ACCORDION_SHAPE9,
        #ACCORDION_SHAPE9>.ladi-shape,
        #ACCORDION_SHAPE14,
        #ACCORDION_SHAPE14>.ladi-shape,
        #ACCORDION_SHAPE15,
        #ACCORDION_SHAPE15>.ladi-shape {
            top: 11.5px;
            left: 381px;
        }

        #ACCORDION_MENU18>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s410x41/5e9ebf43b17ed933fa24046b/asset-62x-20230918065336-zdzry.png");
        }

        #IMAGE96,
        #IMAGE96>.ladi-image>.ladi-image-background {
            width: 326.14px;
            height: 90.4939px;
        }

        #ACCORDION_MENU28>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s410x41/5e9ebf43b17ed933fa24046b/asset-82x-20230918065342-fvsei.png");
        }

        #ACCORDION_MENU30>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s410x41/5e9ebf43b17ed933fa24046b/asset-92x-20230918065342-u0krf.png");
        }

        #SECTION21>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/final_expand_mobie1234567-20230918071730-olww3.png");
        }

        #BUTTON23,
        #BUTTON22,
        #BUTTON3,
        #BUTTON7 {
            width: 140px;
            height: 67px;
        }

        #BUTTON_TEXT23>.ladi-headline,
        #BUTTON_TEXT22>.ladi-headline,
        #BUTTON_TEXT3>.ladi-headline,
        #BUTTON_TEXT7>.ladi-headline {
            font-size: 15px;
        }

        #BOX7,
        #GROUP18,
        #BOX1 {
            width: 883.5px;
            height: 518px;
        }

        #TABS3,
        #TAB_ITEM36,
        #TAB_ITEM35,
        #TABS1,
        #TAB_ITEM1_HN2,
        #TAB_ITEM1_HNSBPS {
            width: 713.333px;
            height: 474px;
        }

        #TABS3,
        #TABS1 {
            top: 44px;
            left: 14.9265px;
        }

        #IMAGE64,
        #IMAGE64>.ladi-image>.ladi-image-background {
            width: 200px;
            height: 37.5979px;
        }

        #IMAGE64,
        #IMAGE63 {
            top: 11.601px;
            left: 0px;
        }

        #IMAGE64>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s550x350/5e9ebf43b17ed933fa24046b/asset-34x-20240529091419-z-bp2.png");
        }

        #TABLE11,
        #TABLE10,
        #TABLE2,
        #TABLE5 {
            width: 713.333px;
            height: 405px;
            top: 53.1989px;
        }

        #TABLE11>.ladi-table,
        #TABLE10>.ladi-table {
            font-size: 12px;
            text-align: left;
        }

        #IMAGE63,
        #IMAGE63>.ladi-image>.ladi-image-background {
            width: 265px;
            height: 37.5979px;
        }

        #IMAGE63>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s600x350/5e9ebf43b17ed933fa24046b/asset-44x-20240529092548-hevnw.png");
        }

        #ACCORDION10,
        #ACCORDION_MENU40 {
            width: 883.5px;
            height: 41px;
        }

        #ACCORDION_CONTENT39 {
            width: 883.5px;
            height: 602.693px;
            top: 51px;
        }

        #IMAGE93,
        #IMAGE93>.ladi-image>.ladi-image-background {
            height: 211.011px;
        }

        #IMAGE93>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s700x550/5e9ebf43b17ed933fa24046b/hdsd-hne-mobile-2-02-02-02-02-04-04-20230929033258-m29ge.png");
        }

        #ACCORDION_SHAPE16,
        #ACCORDION_SHAPE16>.ladi-shape {
            top: 11.5px;
            left: 822.16px;
        }

        #ACCORDION_SHAPE16>.ladi-shape {
            width: 29px;
            height: 18px;
        }

        #HEADLINE41 {
            width: 368px;
            top: 8px;
            left: 34.436px;
        }

        #HEADLINE41>.ladi-headline {
            text-align: left;
        }

        #SECTION23>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/final_expand34343-20230921021031-i5u9c.png");
        }

        #BOX9 {
            width: 200px;
            height: 200px;
        }

        #IMAGE109,
        #IMAGE109>.ladi-image>.ladi-image-background,
        #IMAGE107,
        #IMAGE107>.ladi-image>.ladi-image-background,
        #IMAGE108,
        #IMAGE108>.ladi-image>.ladi-image-background {
            width: 109.548px;
            height: 173.087px;
        }

        #IMAGE68,
        #IMAGE68>.ladi-image>.ladi-image-background {
            width: 288.474px;
        }

        #HEADLINE46,
        #HEADLINE47 {
            width: 200px;
        }

        #HEADLINE46>.ladi-headline {
            font-size: 18px;
        }

        #IMAGE105,
        #IMAGE105>.ladi-image>.ladi-image-background {
            width: 172.128px;
            height: 203.8px;
        }

        #IMAGE106,
        #IMAGE106>.ladi-image>.ladi-image-background {
            width: 667.331px;
            height: 107.426px;
        }

        #IMAGE106>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s1000x450/5e9ebf43b17ed933fa24046b/final_expand4545-09-20230921021337-gg4zr.png");
        }

        #SECTION24>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x662/5e9ebf43b17ed933fa24046b/final_expand_mobie123456789-20230918075833-ge6yp.png");
        }

        #CAROUSEL8 {
            width: 959px;
            height: 306px;
        }

        #CAROUSEL_ITEM43,
        #CAROUSEL_ITEM44,
        #CAROUSEL_ITEM45 {
            height: 306px;
        }

        #IMAGE71,
        #IMAGE71>.ladi-image>.ladi-image-background,
        #IMAGE23,
        #IMAGE23>.ladi-image>.ladi-image-background {
            height: 305.4px;
        }

        #IMAGE72,
        #IMAGE72>.ladi-image>.ladi-image-background,
        #IMAGE24,
        #IMAGE24>.ladi-image>.ladi-image-background {
            width: 285.27px;
            height: 306px;
        }

        #IMAGE72,
        #IMAGE24 {
            left: 14.365px;
        }

        #IMAGE73,
        #IMAGE73>.ladi-image>.ladi-image-background,
        #IMAGE25,
        #IMAGE25>.ladi-image>.ladi-image-background {
            width: 282.538px;
            height: 292.812px;
        }

        #IMAGE73,
        #IMAGE25 {
            top: 13.188px;
        }

        #IMAGE73>.ladi-image>.ladi-image-background,
        #IMAGE25>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s600x600/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web432656-06-20240529091046-ajg90.png");
        }

        #SECTION2 {
            height: 807.2px;
        }

        #video-2 {
            width: 1195.02px;
            height: 672.2px;
            top: 0px;
            left: -120.466px;
        }

        #SHAPE11 {
            top: 316.1px;
            left: 577.51px;
        }

        #SECTION3 {
            height: 589.2px;
        }

        #SECTION3>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x589/5e9ebf43b17ed933fa24046b/final_expand222-20230920040506-lnjal.png");
        }

        #VIDEO1 {
            width: 773.333px;
            height: 435px;
            top: 90.1px;
            left: 93.3325px;
        }

        #VIDEO1>.ladi-video>.ladi-video-background {
            background-image: url("../w.ladicdn.com/s773x435/5e9ebf43b17ed933fa24046b/artboard-1-100ssdc-20231010020320-tewxn.jpg");
        }

        #SHAPE1 {
            width: 40px;
            height: 40px;
            top: 197.5px;
            left: 366.666px;
        }

        #IMAGE84 {
            top: -55.6296px;
            left: 578.415px;
        }

        #IMAGE85,
        #IMAGE85>.ladi-image>.ladi-image-background {
            width: 351.2px;
            height: 104.524px;
        }

        #IMAGE85 {
            top: -51.4626px;
            left: 93.3325px;
        }

        #IMAGE85>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s700x450/5e9ebf43b17ed933fa24046b/asset-24x-20230919032020-ho-s9.png");
        }

        #SECTION4 {
            height: 778.2px;
        }

        #SECTION4>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x778/5e9ebf43b17ed933fa24046b/final_expand123-20230915071051-rs1wf.png");
        }

        #IMAGE1,
        #IMAGE1>.ladi-image>.ladi-image-background {
            width: 529.521px;
            height: 102.844px;
        }

        #IMAGE1 {
            top: 14.878px;
            left: 215.239px;
        }

        #IMAGE2 {
            top: 126.722px;
            left: 313px;
        }

        #IMAGE3,
        #IMAGE3>.ladi-image>.ladi-image-background {
            width: 320.713px;
            height: 325.6px;
        }

        #IMAGE3 {
            top: 379.5px;
            left: 606px;
        }

        #IMAGE3>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x650/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
        }

        #SECTION5 {
            height: 857.2px;
        }

        #SECTION5>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x857/5e9ebf43b17ed933fa24046b/final_expand1234-20230915071541-l4gcu.png");
        }

        #IMAGE4,
        #IMAGE4>.ladi-image>.ladi-image-background {
            width: 911.22px;
            height: 230.617px;
        }

        #IMAGE4 {
            top: 24.7914px;
            left: 26px;
        }

        #IMAGE5,
        #IMAGE5>.ladi-image>.ladi-image-background {
            width: 450.995px;
            height: 452.8px;
        }

        #IMAGE5 {
            top: 313.7px;
            left: -17.232px;
        }

        #IMAGE6,
        #IMAGE6>.ladi-image>.ladi-image-background {
            width: 503.457px;
            height: 142.68px;
        }

        #IMAGE6 {
            top: 434.76px;
            left: 433.763px;
        }

        #GROUP32 {
            top: 267.945px;
            left: 267.61px;
        }

        #SECTION6 {
            height: 813.2px;
        }

        #IMAGE7,
        #IMAGE7>.ladi-image>.ladi-image-background {
            width: 493.484px;
            height: 218.605px;
        }

        #IMAGE7 {
            top: 13.598px;
            left: 455.543px;
        }

        #IMAGE8,
        #IMAGE8>.ladi-image>.ladi-image-background {
            width: 377.423px;
            height: 468.004px;
        }

        #IMAGE8 {
            top: 204.896px;
            left: 519px;
        }

        #IMAGE8>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s700x800/5e9ebf43b17ed933fa24046b/asset-7-20230915073017-e5s83.png");
        }

        #SECTION7 {
            height: 441.2px;
        }

        #SECTION7>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x441/5e9ebf43b17ed933fa24046b/final_expand123467-20230915075857-wj-8k.png");
        }

        #IMAGE9,
        #IMAGE9>.ladi-image>.ladi-image-background {
            width: 311.898px;
        }

        #IMAGE9 {
            top: 15.6px;
            left: 9px;
        }

        #IMAGE9>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x550/5e9ebf43b17ed933fa24046b/icon-062-06-20230919081927-pr9v5.png");
        }

        #IMAGE10 {
            top: 15.6px;
            left: 654px;
        }

        #IMAGE12,
        #IMAGE12>.ladi-image>.ladi-image-background {
            height: 213.565px;
        }

        #IMAGE12 {
            top: 240.88px;
            left: 666px;
        }

        #IMAGE12>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x550/5e9ebf43b17ed933fa24046b/icon-062-063-064-06-20230919081927-bwcrd.png");
        }

        #IMAGE13,
        #IMAGE13>.ladi-image>.ladi-image-background {
            width: 377.772px;
            height: 396.38px;
        }

        #IMAGE13 {
            top: 15.6px;
            left: 302.388px;
        }

        #IMAGE13>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s700x700/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
        }

        #IMAGE11,
        #IMAGE11>.ladi-image>.ladi-image-background {
            height: 195.565px;
        }

        #IMAGE11 {
            top: 249.88px;
            left: 20.187px;
        }

        #SECTION8 {
            height: 871.2px;
        }

        #SECTION8>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x871/5e9ebf43b17ed933fa24046b/final_expand1234678-20230915081550-tbcxb.png");
        }

        #IMAGE14,
        #IMAGE14>.ladi-image>.ladi-image-background {
            width: 503.253px;
            height: 37.0812px;
        }

        #IMAGE14 {
            top: 215.96px;
            left: 225.864px;
        }

        #IMAGE14>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s850x350/5e9ebf43b17ed933fa24046b/asset-15-20230915082148-isknp.png");
        }

        #GROUP18 {
            top: 286.1px;
            left: 32.7405px;
        }

        #IMAGE44,
        #IMAGE44>.ladi-image>.ladi-image-background {
            width: 531.677px;
            height: 28.5979px;
        }

        #IMAGE44 {
            top: 11.601px;
            left: 90.828px;
        }

        #IMAGE44>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s850x350/5e9ebf43b17ed933fa24046b/asset-34x-20240529091419-z-bp2.png");
        }

        #IMAGE48,
        #IMAGE48>.ladi-image>.ladi-image-background {
            width: 324.036px;
            height: 27.5979px;
        }

        #IMAGE48 {
            top: 16.601px;
            left: 208.245px;
        }

        #IMAGE48>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x350/5e9ebf43b17ed933fa24046b/asset-44x-20240529092548-hevnw.png");
        }

        #GROUP16 {
            width: 140px;
            height: 134px;
            top: 330.1px;
            left: 768px;
        }

        #BUTTON7 {
            top: 67px;
        }

        #IMAGE75 {
            top: 589.265px;
            left: 738px;
        }

        #IMAGE77 {
            top: 792.35px;
            left: 224.358px;
        }

        #SECTION9 {
            height: 97.2px;
        }

        #ACCORDION1,
        #ACCORDION_MENU2 {
            height: 42.0448px;
        }

        #ACCORDION1 {
            top: 24.1px;
            left: 44.1085px;
        }

        #ACCORDION_CONTENT1 {
            width: 888.783px;
            height: 510.376px;
            top: 87.9698px;
        }

        #IMAGE92 {
            width: 884.783px;
            height: 513.578px;
            left: 2px;
        }

        #IMAGE92>.ladi-image>.ladi-image-background {
            width: 889.783px;
            height: 513.578px;
            background-image: url("../w.ladicdn.com/s1200x850/5e9ebf43b17ed933fa24046b/hdsd-hne-2-02-02-02-02-02-20230929033300-tzo1j.png");
        }

        #ACCORDION_SHAPE1,
        #ACCORDION_SHAPE1>.ladi-shape {
            top: 11.7931px;
        }

        #ACCORDION_SHAPE1>.ladi-shape {
            height: 18.4587px;
        }

        #HEADLINE3 {
            top: 8.20386px;
        }

        #SECTION10 {
            height: 790.1px;
        }

        #SECTION10>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s1440x790/5e9ebf43b17ed933fa24046b/final_expand34343-20230921021031-i5u9c.png");
        }

        #IMAGE104,
        #IMAGE104>.ladi-image>.ladi-image-background {
            width: 428.508px;
            height: 515.496px;
        }

        #IMAGE104 {
            top: 148.302px;
            left: -148.016px;
        }

        #IMAGE104>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s750x850/5e9ebf43b17ed933fa24046b/asset-93x-20230921021426-t_b-z.png");
        }

        #IMAGE103 {
            top: 455.251px;
            left: -501px;
        }

        #IMAGE98 {
            top: 86.1773px;
            left: 203.101px;
        }

        #IMAGE15,
        #IMAGE15>.ladi-image>.ladi-image-background {
            width: 678.726px;
            height: 40.462px;
        }

        #IMAGE15 {
            top: 41.369px;
            left: 141px;
        }

        #IMAGE16,
        #IMAGE16>.ladi-image>.ladi-image-background {
            width: 495.687px;
            height: 38.8254px;
        }

        #IMAGE16 {
            top: 604.688px;
            left: 234.656px;
        }

        #IMAGE16>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s800x350/5e9ebf43b17ed933fa24046b/asset-19-20230915083640-kudus.png");
        }

        #IMAGE99 {
            top: 86.1773px;
            left: 540.629px;
        }

        #IMAGE100 {
            top: 86.1773px;
            left: 373.122px;
        }

        #BOX8 {
            width: 722px;
            height: 80px;
            top: 490.4px;
            left: 141px;
        }

        #HEADLINE45 {
            width: 661px;
            top: 506.4px;
            left: 180.895px;
        }

        #SECTION11 {
            height: 419.1px;
        }

        #CAROUSEL1 {
            width: 959px;
            top: 62.5px;
        }

        #IMAGE40,
        #IMAGE40>.ladi-image>.ladi-image-background {
            width: 598.495px;
            height: 33.0411px;
        }

        #IMAGE40 {
            top: 6.979px;
            left: 180.752px;
        }

        #IMAGE40>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s900x350/5e9ebf43b17ed933fa24046b/textkjsdfk-20230928084834-offjs.png");
        }

        #SECTION12 {
            height: 566.4px;
        }

        #IMAGE26,
        #IMAGE26>.ladi-image>.ladi-image-background {
            width: 280px;
            height: 280px;
        }

        #IMAGE26 {
            top: 0px;
            left: 142.135px;
        }

        #IMAGE27,
        #IMAGE27>.ladi-image>.ladi-image-background {
            width: 336.081px;
            height: 341px;
        }

        #IMAGE27 {
            top: 249.4px;
            left: 114.094px;
        }

        #GROUP1,
        #BOX2 {
            height: 374px;
        }

        #GROUP1 {
            top: 103.7px;
            left: 509.192px;
        }

        #SECTION27 {
            height: 340.653px;
        }

        #GROUP36 {
            width: 1582px;
            height: 18.7474px;
            top: 13.6526px;
            left: -299.832px;
        }

        #LINE25,
        #LINE26 {
            width: 1582px;
        }

        #LINE26 {
            top: 1.74737px;
            left: 0px;
        }

        #HEADLINE68 {
            width: 1000px;
            top: 51.48px;
            left: -21.795px;
        }

        #HEADLINE68>.ladi-headline,
        #HEADLINE47>.ladi-headline {
            font-size: 18px;
            text-align: left;
        }

        #IMAGE130,
        #IMAGE130>.ladi-image>.ladi-image-background {
            width: 126.89px;
            height: 47.7293px;
        }

        #IMAGE130 {
            top: 140.807px;
            left: 851.315px;
        }

        #IMAGE130>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x350/5e9ebf43b17ed933fa24046b/bo-cong-thuong-20200424042500.png");
        }

        #IMAGE132,
        #IMAGE132>.ladi-image>.ladi-image-background {
            width: 117px;
            height: 117px;
        }

        #IMAGE132 {
            top: 186.946px;
            left: 1236px;
        }

        #IMAGE132>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x450/5e9ebf43b17ed933fa24046b/asset-24x-20210812083846.png");
        }

        #IMAGE133,
        #IMAGE133>.ladi-image>.ladi-image-background {
            width: 136.89px;
            height: 58.5643px;
        }

        #IMAGE133 {
            top: 51.44px;
            left: 698px;
        }

        #IMAGE133>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x400/5e9ebf43b17ed933fa24046b/asset-6-20221213064450-0kzeb.png");
        }

        #IMAGE134,
        #IMAGE134>.ladi-image>.ladi-image-background {
            width: 108.943px;
            height: 163.909px;
        }

        #IMAGE134>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x500/5e9ebf43b17ed933fa24046b/asset-9-20230130082814-4rk1y.png");
        }

        #IMAGE135,
        #IMAGE135>.ladi-image>.ladi-image-background {
            width: 148.685px;
            height: 44.357px;
        }

        #IMAGE135 {
            top: 58.5436px;
            left: 851.315px;
        }

        #IMAGE135>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x350/5e9ebf43b17ed933fa24046b/asset-204x-20231229035352-rbodu.png");
        }

        #HEADLINE69 {
            width: 501px;
            top: 296.797px;
            left: -9.083px;
        }

        #HEADLINE69>.ladi-headline {
            font-size: 11px;
        }

        #IMAGE136 {
            top: 128.422px;
            left: 742px;
        }

        #GROUP37 {
            width: 671px;
            height: 33.229px;
            top: 270.797px;
            left: -9.083px;
        }

        #HEADLINE70 {
            width: 372px;
        }

        #HEADLINE70>.ladi-headline,
        #HEADLINE71>.ladi-headline,
        #HEADLINE72>.ladi-headline {
            font-size: 12px;
        }

        #HEADLINE71,
        #HEADLINE72 {
            width: 159px;
        }

        #HEADLINE71 {
            left: 363.566px;
        }

        #HEADLINE72 {
            left: 511.942px;
        }

        #GROUP38 {
            width: 671px;
            height: 125px;
            top: 102.962px;
            left: -9.083px;
        }

        #PARAGRAPH17 {
            width: 660px;
        }

        #PARAGRAPH17>.ladi-paragraph {
            font-size: 13px;
        }

        #SHAPE36 {
            top: 6px;
        }

        #SHAPE37 {
            top: 25px;
        }

        #SHAPE38 {
            top: 47.394px;
        }

        #SHAPE39 {
            top: 68.394px;
        }

        #SHAPE40 {
            top: 89.394px;
        }

        #POPUP2,
        #POPUP3,
        #POPUP4,
        #POPUP5,
        #POPUP6,
        #POPUP7,
        #POPUP12,
        #POPUP13 {
            width: 720px;
            height: 450.704px;
        }

        #BUTTON10,
        #BUTTON12,
        #BUTTON14,
        #BUTTON16,
        #BUTTON18,
        #BUTTON20,
        #BUTTON28,
        #BUTTON30 {
            top: 341px;
            left: 386px;
        }

        #BUTTON11,
        #BUTTON13,
        #BUTTON15,
        #BUTTON17,
        #BUTTON19,
        #BUTTON21,
        #BUTTON29,
        #BUTTON31 {
            top: 341px;
            left: 189px;
        }

        #LINE5,
        #LINE6,
        #LINE7,
        #LINE8,
        #LINE9,
        #LINE10,
        #LINE11,
        #LINE12,
        #LINE13,
        #LINE14,
        #LINE15,
        #LINE16,
        #LINE17,
        #LINE18,
        #LINE19,
        #LINE20 {
            width: 361px;
        }

        #LINE5,
        #LINE7,
        #LINE9,
        #LINE11,
        #LINE13,
        #LINE15,
        #LINE17,
        #LINE19 {
            top: 37.8518px;
            left: 179.5px;
        }

        #LINE6,
        #LINE8,
        #LINE10,
        #LINE12,
        #LINE14,
        #LINE16,
        #LINE18,
        #LINE20 {
            top: 88.8518px;
            left: 179.5px;
        }

        #HEADLINE23,
        #HEADLINE27,
        #HEADLINE31,
        #HEADLINE33,
        #HEADLINE35,
        #HEADLINE37,
        #HEADLINE50,
        #HEADLINE52 {
            width: 288px;
            top: 56.8516px;
            left: 216px;
        }

        #HEADLINE23>.ladi-headline,
        #HEADLINE27>.ladi-headline,
        #HEADLINE31>.ladi-headline,
        #HEADLINE33>.ladi-headline,
        #HEADLINE35>.ladi-headline,
        #HEADLINE37>.ladi-headline,
        #HEADLINE50>.ladi-headline,
        #HEADLINE52>.ladi-headline {
            font-size: 20px;
        }

        #HEADLINE24,
        #HEADLINE28,
        #HEADLINE32,
        #HEADLINE34,
        #HEADLINE36,
        #HEADLINE38,
        #HEADLINE51,
        #HEADLINE53 {
            width: 635px;
            top: 136.852px;
            left: 49px;
        }

        #HEADLINE24>.ladi-headline,
        #HEADLINE28>.ladi-headline,
        #HEADLINE32>.ladi-headline,
        #HEADLINE34>.ladi-headline,
        #HEADLINE36>.ladi-headline,
        #HEADLINE38>.ladi-headline,
        #HEADLINE51>.ladi-headline,
        #HEADLINE53>.ladi-headline {
            font-size: 16px;
        }

        #POPUP8,
        #POPUP9,
        #POPUP10 {
            width: 700.428px;
            height: 887px;
        }

        #IMAGE78,
        #IMAGE78>.ladi-image>.ladi-image-background,
        #IMAGE79,
        #IMAGE79>.ladi-image>.ladi-image-background,
        #IMAGE80,
        #IMAGE80>.ladi-image>.ladi-image-background {
            width: 686.532px;
            height: 887px;
        }

        #IMAGE78,
        #IMAGE79,
        #IMAGE80 {
            top: 0px;
            left: 8px;
        }

        #IMAGE78>.ladi-image>.ladi-image-background,
        #IMAGE79>.ladi-image>.ladi-image-background,
        #IMAGE80>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s1000x1200/5e9ebf43b17ed933fa24046b/z4066254579376_a18c1912d4468eb9b19c88dab4da0a7e-20230131013837-gqgo6.jpg");
        }

        #POPUP11 {
            height: 62px;
        }

        #IMAGE81 {
            top: 17px;
            left: 39px;
        }

        #IMAGE82 {
            top: 17px;
            left: 208.407px;
        }

        #IMAGE83 {
            top: 17px;
            left: 310.652px;
        }
    }

    @media (max-width: 767px) {
        #SECTION1 {
            height: 583.428px;
        }

        #SECTION1,
        #SECTION2,
        #SECTION3,
        #SECTION4,
        #SECTION5,
        #SECTION6,
        #SECTION7,
        #SECTION8,
        #SECTION9,
        #SECTION10,
        #SECTION11 {
            display: none !important;
        }

        #IMAGE34,
        #IMAGE34>.ladi-image>.ladi-image-background {
            width: 54.2857px;
            height: 50px;
        }

        #IMAGE34 {
            top: 0px;
            left: 182.857px;
        }

        #IMAGE38,
        #IMAGE38>.ladi-image>.ladi-image-background {
            width: 107.182px;
            height: 34.3637px;
        }

        #IMAGE38 {
            top: 91.0599px;
            left: 156.409px;
        }

        #IMAGE38>.ladi-image>.ladi-image-background,
        #IMAGE50>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x350/5e9ebf43b17ed933fa24046b/343434-03-20240529061843-k8pcn.png");
        }

        #HEADLINE42 {
            top: 167.421px;
            left: 110px;
        }

        #HEADLINE42>.ladi-headline,
        #HEADLINE43>.ladi-headline,
        #HEADLINE44>.ladi-headline {
            font-size: 18px;
            text-align: left;
        }

        #HEADLINE43 {
            top: 245.421px;
            left: 110px;
        }

        #HEADLINE44,
        #HEADLINE45,
        #HEADLINE23,
        #HEADLINE27,
        #HEADLINE31,
        #HEADLINE33,
        #HEADLINE35,
        #HEADLINE37,
        #HEADLINE50,
        #HEADLINE52 {
            width: 200px;
        }

        #HEADLINE44 {
            top: 206.421px;
            left: 110px;
        }

        #IMAGE112 {
            top: 135.424px;
            left: 183.323px;
        }

        #IMAGE111 {
            top: 60px;
            left: 183.323px;
        }

        #SECTION14 {
            height: 73.2px;
        }

        #SHAPE8 {
            top: 17.2228px;
            left: 7px;
        }

        #IMAGE49,
        #IMAGE49>.ladi-image>.ladi-image-background {
            width: 177.167px;
        }

        #IMAGE49 {
            top: 37.5259px;
            left: -436.769px;
        }

        #IMAGE50,
        #IMAGE50>.ladi-image>.ladi-image-background {
            width: 134.098px;
            height: 42.1219px;
        }

        #IMAGE50 {
            top: 17.2228px;
            left: 170px;
        }

        #IMAGE120 {
            top: 12.4766px;
            left: 80.7237px;
        }

        #IMAGE122 {
            top: 12.0993px;
            left: 352.529px;
        }

        #IMAGE121 {
            top: 37.599px;
            left: 352.529px;
        }

        #SECTION15 {
            height: 310.977px;
        }

        #SECTION15>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x310/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web543546734-20240529062903-tgnxx.png");
        }

        #VIDEO9 {
            width: 420.37px;
            height: 310.977px;
        }

        #SHAPE9 {
            top: 135.488px;
            left: 190.185px;
        }

        #SECTION16 {
            height: 330.2px;
        }

        #SECTION16>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x330/5e9ebf43b17ed933fa24046b/landing-haniekid-0123-20230919083356-lroj8.png");
        }

        #VIDEO10 {
            width: 420px;
            height: 236.249px;
            top: 89.0887px;
        }

        #VIDEO10>.ladi-video>.ladi-video-background {
            background-image: url("../w.ladicdn.com/s420x236/5e9ebf43b17ed933fa24046b/artboard-1-100ssdc-20231010020320-tewxn.jpg");
        }

        #SHAPE10 {
            top: 98.1245px;
            left: 190px;
        }

        #IMAGE86 {
            top: 3.0907px;
            left: 504.069px;
        }

        #IMAGE87,
        #IMAGE87>.ladi-image>.ladi-image-background {
            width: 184.351px;
            height: 54.8664px;
        }

        #IMAGE87 {
            top: 15.814px;
            left: 18.2925px;
        }

        #IMAGE110,
        #IMAGE110>.ladi-image>.ladi-image-background {
            width: 154.739px;
            height: 58.3479px;
        }

        #IMAGE110 {
            top: 15.814px;
            left: 254.797px;
        }

        #IMAGE110>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s500x400/5e9ebf43b17ed933fa24046b/asset-144x-20230919082244-nrx9b.png");
        }

        #SECTION17 {
            height: 278.2px;
        }

        #SECTION17>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x278/5e9ebf43b17ed933fa24046b/landing-haniekid-01234-052-20230919084356-mkdvd.png");
        }

        #IMAGE88 {
            top: 9.951px;
            left: 117.782px;
        }

        #IMAGE89 {
            top: 48.801px;
            left: 158.398px;
        }

        #IMAGE90,
        #IMAGE90>.ladi-image>.ladi-image-background {
            width: 120.142px;
            height: 126.512px;
        }

        #IMAGE90 {
            top: 130.664px;
            left: 264.394px;
        }

        #SECTION18 {
            height: 483.575px;
        }

        #SECTION18>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x483/5e9ebf43b17ed933fa24046b/final_expand_mobie1234-20230918063927-momph.png");
        }

        #IMAGE52 {
            top: 7.867px;
            left: 5.2925px;
        }

        #IMAGE53 {
            top: 148.825px;
            left: 41px;
        }

        #IMAGE54 {
            top: 232.525px;
            left: 105.485px;
        }

        #BUTTON33 {
            width: 256px;
            height: 24px;
            top: 118.831px;
            left: 93px;
        }

        #BUTTON_TEXT33 {
            width: 222px;
        }

        #BUTTON_TEXT33>.ladi-headline,
        #HEADLINE46>.ladi-headline {
            font-size: 10px;
        }

        #SHAPE28 {
            top: 123.935px;
            left: 319.659px;
        }

        #SHAPE29 {
            top: 123.435px;
            left: 116px;
        }

        #SECTION19 {
            height: 522.2px;
        }

        #SECTION19>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x522/5e9ebf43b17ed933fa24046b/final_expand_mobie12345-20230918064815-ljvpt.png");
        }

        #IMAGE56,
        #IMAGE56>.ladi-image>.ladi-image-background {
            width: 200px;
            height: 78.6047px;
        }

        #IMAGE56 {
            top: -0.0005px;
            left: 203px;
        }

        #IMAGE57 {
            top: 76.6005px;
            left: 240px;
        }

        #IMAGE58,
        #IMAGE58>.ladi-image>.ladi-image-background {
            width: 224.904px;
            height: 238.619px;
        }

        #IMAGE58 {
            top: 283.581px;
            left: 105.485px;
        }

        #IMAGE58>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s550x550/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
        }

        #SECTION20 {
            height: 377.2px;
        }

        #SECTION20>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x377/5e9ebf43b17ed933fa24046b/final_expand_mobie123456-20230918065310-bf_62.png");
        }

        #ACCORDION7,
        #ACCORDION_MENU26,
        #ACCORDION3,
        #ACCORDION_MENU18,
        #ACCORDION8,
        #ACCORDION_MENU28,
        #ACCORDION9,
        #ACCORDION_MENU30 {
            width: 393.324px;
            height: 90px;
        }

        #ACCORDION7 {
            top: 93.901px;
            left: 13.338px;
        }

        #ACCORDION_CONTENT25 {
            width: 336.75px;
            height: 175px;
            top: 76px;
            left: 33.287px;
        }

        #IMAGE95 {
            left: 3.5365px;
        }

        #ACCORDION_MENU26>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s393x90/5e9ebf43b17ed933fa24046b/asset-72x-20230918065342-bnsja.png");
        }

        #ACCORDION_SHAPE13,
        #ACCORDION_SHAPE13>.ladi-shape,
        #ACCORDION_SHAPE9,
        #ACCORDION_SHAPE9>.ladi-shape,
        #ACCORDION_SHAPE14,
        #ACCORDION_SHAPE14>.ladi-shape,
        #ACCORDION_SHAPE15,
        #ACCORDION_SHAPE15>.ladi-shape {
            top: 36px;
            left: 339.324px;
        }

        #ACCORDION3 {
            left: 13.338px;
        }

        #ACCORDION_CONTENT17 {
            width: 327.75px;
            height: 171px;
            top: 75px;
            left: 42.912px;
        }

        #IMAGE94 {
            top: 7.0999px;
        }

        #ACCORDION_MENU18>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s393x90/5e9ebf43b17ed933fa24046b/asset-62x-20230918065336-zdzry.png");
        }

        #ACCORDION8 {
            top: 188.901px;
            left: 13.338px;
        }

        #ACCORDION_CONTENT27 {
            width: 320.013px;
            height: 99px;
            top: 77px;
            left: 45.912px;
        }

        #IMAGE96,
        #IMAGE96>.ladi-image>.ladi-image-background {
            width: 336.952px;
            height: 93.4939px;
        }

        #IMAGE96 {
            left: -5px;
        }

        #ACCORDION_MENU28>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s393x90/5e9ebf43b17ed933fa24046b/asset-82x-20230918065342-fvsei.png");
        }

        #ACCORDION9 {
            top: 281.901px;
            left: 13.338px;
        }

        #ACCORDION_CONTENT29 {
            width: 332.436px;
            height: 118px;
            top: 74px;
            left: 41.643px;
        }

        #ACCORDION_MENU30>.ladi-frame-bg>.ladi-frame-background {
            background-image: url("../w.ladicdn.com/s393x90/5e9ebf43b17ed933fa24046b/asset-92x-20230918065342-u0krf.png");
        }

        #SECTION21 {
            height: 404.2px;
        }

        #SECTION21>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x404/5e9ebf43b17ed933fa24046b/final_expand_mobie1234567-20230918071730-olww3.png");
        }

        #BUTTON23 {
            width: 105px;
            height: 40px;
            top: 103.381px;
            left: 125.338px;
        }

        #BUTTON_TEXT23>.ladi-headline,
        #BUTTON_TEXT22>.ladi-headline,
        #TABLE2>.ladi-table,
        #TABLE5>.ladi-table,
        #HEADLINE69>.ladi-headline {
            font-size: 12px;
        }

        #BUTTON22 {
            width: 112px;
            height: 40px;
            top: 103.381px;
            left: 13.338px;
        }

        #BOX7,
        #GROUP18,
        #BOX1 {
            width: 400px;
            height: 221.845px;
        }

        #BOX7 {
            top: 149.381px;
            left: 10px;
        }

        #TABS3,
        #TAB_ITEM36,
        #TAB_ITEM35 {
            width: 393.324px;
            height: 218px;
        }

        #TABS3 {
            top: 143.381px;
            left: 13.338px;
        }

        #IMAGE64,
        #IMAGE64>.ladi-image>.ladi-image-background {
            width: 331.613px;
            height: 18px;
        }

        #IMAGE64 {
            top: 9px;
            left: 30.8555px;
        }

        #IMAGE64>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x350/5e9ebf43b17ed933fa24046b/asset-34x-20240529091419-z-bp2.png");
        }

        #TABLE11 {
            width: 400px;
            height: 183px;
            top: 35px;
        }

        #TABLE11>.ladi-table,
        #TABLE10>.ladi-table {
            font-size: 11px;
            text-align: center;
        }

        #IMAGE63,
        #IMAGE63>.ladi-image>.ladi-image-background {
            width: 220.891px;
            height: 19px;
        }

        #IMAGE63 {
            top: 9px;
            left: 94.7415px;
        }

        #IMAGE63>.ladi-image>.ladi-image-background,
        #IMAGE48>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s550x350/5e9ebf43b17ed933fa24046b/asset-44x-20240529092548-hevnw.png");
        }

        #TABLE10,
        #TABLE2,
        #TABLE5 {
            width: 400px;
            height: 236px;
        }

        #TABLE10 {
            top: 37.5979px;
        }

        #IMAGE67 {
            top: 365.226px;
            left: 82.294px;
        }

        #SECTION22 {
            height: 59.2px;
        }

        #ACCORDION10,
        #ACCORDION_MENU40 {
            width: 393.324px;
            height: 35.4095px;
        }

        #ACCORDION10 {
            top: 7.381px;
            left: 13.338px;
        }

        #ACCORDION_CONTENT39 {
            width: 393.324px;
            height: 489.497px;
            top: 50.1634px;
        }

        #IMAGE93,
        #IMAGE93>.ladi-image>.ladi-image-background {
            height: 470.965px;
        }

        #IMAGE93>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s700x800/5e9ebf43b17ed933fa24046b/hdsd-hne-mobile-2-02-02-02-02-04-04-20230929033258-m29ge.png");
        }

        #ACCORDION_SHAPE16,
        #ACCORDION_SHAPE16>.ladi-shape {
            top: 9.93197px;
            left: 366.016px;
        }

        #ACCORDION_SHAPE16>.ladi-shape {
            width: 12.9105px;
            height: 15.5457px;
        }

        #HEADLINE41 {
            width: 224px;
            top: 6.90917px;
            left: 15.3305px;
        }

        #HEADLINE41>.ladi-headline {
            text-align: center;
        }

        #SECTION23 {
            height: 338.2px;
        }

        #SECTION23>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x338/5e9ebf43b17ed933fa24046b/final_expand34343-20230921021031-i5u9c.png");
        }

        #BOX9 {
            width: 347px;
            height: 56.647px;
            top: 202.067px;
            left: 63px;
        }

        #IMAGE109,
        #IMAGE109>.ladi-image>.ladi-image-background,
        #IMAGE107,
        #IMAGE107>.ladi-image>.ladi-image-background,
        #IMAGE108,
        #IMAGE108>.ladi-image>.ladi-image-background {
            width: 103.219px;
            height: 163.087px;
        }

        #IMAGE109 {
            top: 16.8672px;
            left: 96.111px;
        }

        #IMAGE68,
        #IMAGE68>.ladi-image>.ladi-image-background {
            width: 291.474px;
        }

        #IMAGE68 {
            top: 219.889px;
            left: -414.974px;
        }

        #IMAGE91 {
            top: 10.7073px;
            left: 63px;
        }

        #IMAGE107 {
            top: 14.8672px;
            left: 172.187px;
        }

        #IMAGE108 {
            top: 16.8672px;
            left: 254.064px;
        }

        #HEADLINE46 {
            width: 315px;
            top: 207.302px;
            left: 81.858px;
        }

        #BUTTON27 {
            width: 280.389px;
            height: 23.072px;
            top: 271.951px;
            left: 90.111px;
        }

        #BUTTON_TEXT27>.ladi-headline,
        #HEADLINE72>.ladi-headline,
        #PARAGRAPH17>.ladi-paragraph {
            font-size: 9px;
        }

        #IMAGE105,
        #IMAGE105>.ladi-image>.ladi-image-background {
            width: 199.999px;
            height: 236.8px;
        }

        #IMAGE105 {
            top: 68.2px;
            left: -54px;
        }

        #IMAGE106,
        #IMAGE106>.ladi-image>.ladi-image-background {
            width: 597.348px;
            height: 96.16px;
        }

        #IMAGE106 {
            top: 247.907px;
            left: -102.275px;
        }

        #IMAGE106>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s900x400/5e9ebf43b17ed933fa24046b/final_expand4545-09-20230921021337-gg4zr.png");
        }

        #SECTION24 {
            height: 363.2px;
        }

        #SECTION24>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x363/5e9ebf43b17ed933fa24046b/final_expand_mobie123456789-20230918075833-ge6yp.png");
        }

        #CAROUSEL8 {
            width: 313px;
            height: 312px;
            top: 40.6px;
            left: 53.5px;
        }

        #CAROUSEL_ITEM43,
        #CAROUSEL_ITEM44,
        #CAROUSEL_ITEM45 {
            height: 312px;
        }

        #IMAGE71,
        #IMAGE71>.ladi-image>.ladi-image-background,
        #IMAGE23,
        #IMAGE23>.ladi-image>.ladi-image-background {
            height: 307.4px;
        }

        #IMAGE72,
        #IMAGE72>.ladi-image>.ladi-image-background,
        #IMAGE24,
        #IMAGE24>.ladi-image>.ladi-image-background {
            width: 290.951px;
            height: 305.875px;
        }

        #IMAGE72,
        #IMAGE24 {
            left: 10.1945px;
        }

        #IMAGE73,
        #IMAGE73>.ladi-image>.ladi-image-background,
        #IMAGE25,
        #IMAGE25>.ladi-image>.ladi-image-background {
            width: 292.944px;
            height: 303.597px;
        }

        #IMAGE73,
        #IMAGE25 {
            top: 12.403px;
        }

        #IMAGE73>.ladi-image>.ladi-image-background,
        #IMAGE25>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s600x650/5e9ebf43b17ed933fa24046b/ldp-hanie-kid-web432656-06-20240529091046-ajg90.png");
        }

        #IMAGE74 {
            top: 19.5586px;
            left: 55.659px;
        }

        #SECTION2 {
            height: 245px;
        }

        #video-2,
        #VIDEO1 {
            width: 400px;
            height: 225px;
        }

        #video-2,
        #IMAGE1,
        #IMAGE4,
        #IMAGE15,
        #IMAGE40 {
            top: 10px;
            left: 10px;
        }

        #SHAPE11 {
            top: 90.5px;
            left: 178px;
        }

        #SECTION3 {
            height: 510.353px;
        }

        #SECTION3>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x510/5e9ebf43b17ed933fa24046b/final_expand222-20230920040506-lnjal.png");
        }

        #VIDEO1 {
            top: 114.524px;
            left: 10px;
        }

        #VIDEO1>.ladi-video>.ladi-video-background {
            background-image: url("../w.ladicdn.com/s400x225/5e9ebf43b17ed933fa24046b/artboard-1-100ssdc-20231010020320-tewxn.jpg");
        }

        #SHAPE1 {
            width: 60px;
            height: 60px;
            top: 82.5001px;
            left: 170px;
        }

        #IMAGE84,
        #IMAGE84>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 150.829px;
        }

        #IMAGE84 {
            top: 349.524px;
            left: 10px;
        }

        #IMAGE84>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s750x500/5e9ebf43b17ed933fa24046b/asset-144x-20230919082244-nrx9b.png");
        }

        #IMAGE85,
        #IMAGE85>.ladi-image>.ladi-image-background {
            width: 317.6px;
            height: 94.5238px;
        }

        #IMAGE85 {
            top: 10px;
            left: 51.2px;
        }

        #IMAGE85>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x400/5e9ebf43b17ed933fa24046b/asset-24x-20230919032020-ho-s9.png");
        }

        #SECTION4 {
            height: 838.288px;
        }

        #SECTION4>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x838/5e9ebf43b17ed933fa24046b/final_expand123-20230915071051-rs1wf.png");
        }

        #IMAGE1,
        #IMAGE1>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 77.6883px;
        }

        #IMAGE2 {
            top: 97.6883px;
            left: 36px;
        }

        #IMAGE3,
        #IMAGE3>.ladi-image>.ladi-image-background {
            width: 319.007px;
            height: 372.6px;
        }

        #IMAGE3 {
            top: 455.688px;
            left: 50.4965px;
        }

        #IMAGE3>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x700/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
        }

        #SECTION5 {
            height: 702.117px;
        }

        #SECTION5>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x702/5e9ebf43b17ed933fa24046b/final_expand1234-20230915071541-l4gcu.png");
        }

        #IMAGE4,
        #IMAGE4>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 101.234px;
        }

        #IMAGE5,
        #IMAGE5>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 401.601px;
        }

        #IMAGE5 {
            top: 167.155px;
            left: 10px;
        }

        #IMAGE6,
        #IMAGE6>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 113.36px;
        }

        #IMAGE6 {
            top: 578.756px;
            left: 10px;
        }

        #GROUP32 {
            top: 121.234px;
            left: -4px;
        }

        #SECTION6 {
            height: 549.605px;
        }

        #IMAGE7,
        #IMAGE7>.ladi-image>.ladi-image-background {
            width: 360.296px;
            height: 141.605px;
        }

        #IMAGE7 {
            top: 10px;
            left: 29.852px;
        }

        #IMAGE8,
        #IMAGE8>.ladi-image>.ladi-image-background {
            width: 304.839px;
            height: 378px;
        }

        #IMAGE8 {
            top: 161.605px;
            left: 57.5805px;
        }

        #IMAGE8>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x700/5e9ebf43b17ed933fa24046b/asset-7-20230915073017-e5s83.png");
        }

        #SECTION7 {
            height: 1336.07px;
        }

        #SECTION7>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x1336/5e9ebf43b17ed933fa24046b/final_expand123467-20230915075857-wj-8k.png");
        }

        #IMAGE9,
        #IMAGE9>.ladi-image>.ladi-image-background {
            width: 299.176px;
        }

        #IMAGE9 {
            top: 492.38px;
            left: 60.412px;
        }

        #IMAGE9>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s600x550/5e9ebf43b17ed933fa24046b/icon-062-06-20230919081927-pr9v5.png");
        }

        #IMAGE10 {
            top: 1083.79px;
            left: 48.333px;
        }

        #IMAGE12,
        #IMAGE12>.ladi-image>.ladi-image-background,
        #IMAGE11,
        #IMAGE11>.ladi-image>.ladi-image-background {
            height: 169.565px;
        }

        #IMAGE12 {
            top: 734.66px;
            left: 56.087px;
        }

        #IMAGE12>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s650x500/5e9ebf43b17ed933fa24046b/icon-062-063-064-06-20230919081927-bwcrd.png");
        }

        #IMAGE13,
        #IMAGE13>.ladi-image>.ladi-image-background {
            width: 370.204px;
            height: 472.38px;
        }

        #IMAGE13 {
            top: 10px;
            left: 24.898px;
        }

        #IMAGE13>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s700x800/5e9ebf43b17ed933fa24046b/43437568769876-02-20231025041326-uesee.png");
        }

        #IMAGE11 {
            top: 914.225px;
            left: 55.238px;
        }

        #SECTION8 {
            height: 632.971px;
        }

        #SECTION8>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x632/5e9ebf43b17ed933fa24046b/final_expand1234678-20230915081550-tbcxb.png");
        }

        #IMAGE14,
        #IMAGE14>.ladi-image>.ladi-image-background {
            width: 252.069px;
            height: 19.007px;
        }

        #IMAGE14 {
            top: 10px;
            left: 77.926px;
        }

        #IMAGE14>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s600x350/5e9ebf43b17ed933fa24046b/asset-15-20230915082148-isknp.png");
        }

        #GROUP18 {
            top: 393.126px;
            left: 10px;
        }

        #TABS1,
        #TAB_ITEM1_HN2,
        #TAB_ITEM1_HNSBPS {
            width: 384.444px;
            height: 195px;
        }

        #TABS1 {
            top: 14.845px;
            left: 7px;
        }

        #IMAGE44,
        #IMAGE44>.ladi-image>.ladi-image-background,
        #IMAGE48,
        #IMAGE48>.ladi-image>.ladi-image-background {
            width: 200px;
            height: 37.5979px;
        }

        #IMAGE44,
        #IMAGE48 {
            top: 0px;
            left: 0px;
        }

        #IMAGE44>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s550x350/5e9ebf43b17ed933fa24046b/asset-34x-20240529091419-z-bp2.png");
        }

        #TABLE2,
        #TABLE5 {
            top: 0px;
        }

        #GROUP16 {
            width: 160px;
            height: 80px;
            top: 85px;
            left: 580px;
        }

        #BUTTON3,
        #BUTTON7 {
            width: 160px;
            height: 40px;
        }

        #BUTTON_TEXT3>.ladi-headline,
        #BUTTON_TEXT7>.ladi-headline {
            font-size: 14px;
        }

        #BUTTON7 {
            top: 40px;
        }

        #IMAGE75 {
            top: 255px;
            left: 110px;
        }

        #IMAGE77 {
            top: 493.07px;
            left: 18.679px;
        }

        #SECTION9,
        #POPUP11 {
            height: 61px;
        }

        #ACCORDION1,
        #ACCORDION_MENU2 {
            height: 41px;
        }

        #ACCORDION1 {
            top: 10px;
            left: -231.75px;
        }

        #ACCORDION_CONTENT1 {
            width: 883.5px;
            height: 602.693px;
            top: 51px;
        }

        #IMAGE92,
        #IMAGE92>.ladi-image>.ladi-image-background {
            width: 888.783px;
            height: 476.815px;
        }

        #IMAGE92 {
            left: 0px;
        }

        #IMAGE92>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s1200x800/5e9ebf43b17ed933fa24046b/hdsd-hne-2-02-02-02-02-02-20230929033300-tzo1j.png");
        }

        #ACCORDION_SHAPE1,
        #ACCORDION_SHAPE1>.ladi-shape,
        #HEADLINE47 {
            top: 11.5px;
        }

        #ACCORDION_SHAPE1>.ladi-shape {
            height: 18px;
        }

        #HEADLINE3 {
            top: 8px;
        }

        #SECTION10 {
            height: 2183.54px;
        }

        #SECTION10>.ladi-section-background {
            background-image: url("../w.ladicdn.com/s768x2183/5e9ebf43b17ed933fa24046b/final_expand34343-20230921021031-i5u9c.png");
        }

        #IMAGE104,
        #IMAGE104>.ladi-image>.ladi-image-background {
            width: 509.709px;
            height: 603.496px;
        }

        #IMAGE104 {
            top: 784.894px;
            left: -421.786px;
        }

        #IMAGE104>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s850x950/5e9ebf43b17ed933fa24046b/asset-93x-20230921021426-t_b-z.png");
        }

        #IMAGE103 {
            top: 1174.97px;
            left: -838.895px;
        }

        #IMAGE98 {
            top: 44.4585px;
            left: 96.0065px;
        }

        #IMAGE15,
        #IMAGE15>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 24.4585px;
        }

        #IMAGE16,
        #IMAGE16>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 31.6498px;
        }

        #IMAGE16 {
            top: 2141.89px;
            left: 10px;
        }

        #IMAGE16>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s750x350/5e9ebf43b17ed933fa24046b/asset-19-20230915083640-kudus.png");
        }

        #IMAGE99 {
            top: 414.676px;
            left: 96.0065px;
        }

        #IMAGE100 {
            top: 1771.67px;
            left: 96.0065px;
        }

        #BOX8 {
            width: 400px;
            height: 200px;
            top: 1522.67px;
            left: 10px;
        }

        #HEADLINE45 {
            top: 1732.67px;
            left: 110px;
        }

        #HEADLINE45>.ladi-headline {
            font-size: 18px;
        }

        #SECTION11 {
            height: 358.083px;
        }

        #CAROUSEL1 {
            width: 420px;
            top: 42.0828px;
        }

        #IMAGE40,
        #IMAGE40>.ladi-image>.ladi-image-background {
            width: 400px;
            height: 22.0828px;
        }

        #IMAGE40>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s750x350/5e9ebf43b17ed933fa24046b/textkjsdfk-20230928084834-offjs.png");
        }

        #SECTION12 {
            height: 900.4px;
        }

        #IMAGE26,
        #IMAGE26>.ladi-image>.ladi-image-background {
            width: 191px;
            height: 191px;
        }

        #IMAGE26 {
            top: 391px;
            left: 196.481px;
        }

        #IMAGE27,
        #IMAGE27>.ladi-image>.ladi-image-background {
            width: 318.544px;
            height: 329.669px;
        }

        #IMAGE27 {
            top: 570.731px;
            left: 66.538px;
        }

        #GROUP1,
        #BOX2 {
            height: 380px;
        }

        #GROUP1 {
            top: 11px;
            left: 64.865px;
        }

        #SECTION27 {
            height: 442.888px;
        }

        #GROUP36 {
            width: 1841px;
            height: 19px;
            top: 10px;
            left: -710.5px;
        }

        #LINE25,
        #LINE26 {
            width: 1811px;
        }

        #LINE26 {
            top: 2px;
            left: 30px;
        }

        #HEADLINE68 {
            width: 391px;
            top: 25px;
            left: 10.5px;
        }

        #HEADLINE68>.ladi-headline {
            font-size: 14px;
            text-align: center;
        }

        #IMAGE130,
        #IMAGE130>.ladi-image>.ladi-image-background {
            width: 138.854px;
            height: 52.2294px;
        }

        #IMAGE130 {
            top: 316.404px;
            left: 222.573px;
        }

        #IMAGE130>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s450x400/5e9ebf43b17ed933fa24046b/bo-cong-thuong-20200424042500.png");
        }

        #IMAGE132,
        #IMAGE132>.ladi-image>.ladi-image-background {
            width: 63px;
            height: 63px;
        }

        #IMAGE132 {
            top: 105px;
            left: 1040px;
        }

        #IMAGE132>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s400x400/5e9ebf43b17ed933fa24046b/asset-24x-20210812083846.png");
        }

        #IMAGE133,
        #IMAGE133>.ladi-image>.ladi-image-background {
            width: 157.926px;
            height: 67.5643px;
        }

        #IMAGE133 {
            top: 218.535px;
            left: 15px;
        }

        #IMAGE133>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s500x400/5e9ebf43b17ed933fa24046b/asset-6-20221213064450-0kzeb.png");
        }

        #IMAGE134,
        #IMAGE134>.ladi-image>.ladi-image-background {
            width: 59.7582px;
            height: 89.909px;
        }

        #IMAGE134>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s400x400/5e9ebf43b17ed933fa24046b/asset-9-20230130082814-4rk1y.png");
        }

        #IMAGE135,
        #IMAGE135>.ladi-image>.ladi-image-background {
            width: 178.853px;
            height: 53.357px;
        }

        #IMAGE135 {
            top: 225.639px;
            left: 209.647px;
        }

        #IMAGE135>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s500x400/5e9ebf43b17ed933fa24046b/asset-204x-20231229035352-rbodu.png");
        }

        #HEADLINE69 {
            width: 405px;
            top: 395px;
            left: 10.5px;
        }

        #IMAGE136 {
            top: 312.462px;
            left: 59.9428px;
        }

        #GROUP37 {
            width: 484.091px;
            height: 13px;
            top: 184.5px;
            left: 5px;
        }

        #HEADLINE70 {
            width: 333px;
        }

        #HEADLINE70>.ladi-headline,
        #HEADLINE71>.ladi-headline {
            font-size: 8px;
        }

        #HEADLINE71,
        #HEADLINE72 {
            width: 142px;
        }

        #HEADLINE71 {
            left: 242.265px;
        }

        #HEADLINE72 {
            left: 342.019px;
        }

        #GROUP38 {
            width: 404px;
            height: 115px;
            top: 55px;
            left: 7px;
        }

        #PARAGRAPH17 {
            width: 393px;
        }

        #SHAPE36 {
            top: 4px;
        }

        #SHAPE37 {
            top: 31px;
        }

        #SHAPE38 {
            top: 59.394px;
        }

        #SHAPE39 {
            top: 73.394px;
        }

        #SHAPE40 {
            top: 87.394px;
        }

        #POPUP2,
        #POPUP3,
        #POPUP4,
        #POPUP5,
        #POPUP6,
        #POPUP7,
        #POPUP12,
        #POPUP13 {
            width: 420px;
            height: 400px;
        }

        #BUTTON10,
        #BUTTON12,
        #BUTTON14,
        #BUTTON16,
        #BUTTON18,
        #BUTTON20,
        #BUTTON28,
        #BUTTON30 {
            top: 331px;
            left: 227px;
        }

        #BUTTON11,
        #BUTTON13,
        #BUTTON15,
        #BUTTON17,
        #BUTTON19,
        #BUTTON21,
        #BUTTON29,
        #BUTTON31 {
            top: 331px;
            left: 47px;
        }

        #LINE5,
        #LINE6,
        #LINE7,
        #LINE8,
        #LINE9,
        #LINE10,
        #LINE11,
        #LINE12,
        #LINE13,
        #LINE14,
        #LINE15,
        #LINE16,
        #LINE17,
        #LINE18,
        #LINE19,
        #LINE20 {
            width: 258px;
        }

        #LINE5,
        #LINE7,
        #LINE9,
        #LINE11,
        #LINE13,
        #LINE15,
        #LINE17,
        #LINE19 {
            top: 19px;
            left: 77.5px;
        }

        #LINE6,
        #LINE8,
        #LINE10,
        #LINE12,
        #LINE14,
        #LINE16,
        #LINE18,
        #LINE20 {
            top: 68.8518px;
            left: 77.5px;
        }

        #HEADLINE23,
        #HEADLINE27,
        #HEADLINE31,
        #HEADLINE33,
        #HEADLINE35,
        #HEADLINE37,
        #HEADLINE50,
        #HEADLINE52 {
            top: 41.4259px;
            left: 106.5px;
        }

        #HEADLINE23>.ladi-headline,
        #HEADLINE27>.ladi-headline,
        #HEADLINE31>.ladi-headline,
        #HEADLINE33>.ladi-headline,
        #HEADLINE35>.ladi-headline,
        #HEADLINE37>.ladi-headline,
        #HEADLINE50>.ladi-headline,
        #HEADLINE52>.ladi-headline {
            font-size: 15px;
        }

        #HEADLINE24,
        #HEADLINE28,
        #HEADLINE32,
        #HEADLINE34,
        #HEADLINE36,
        #HEADLINE38,
        #HEADLINE51,
        #HEADLINE53 {
            width: 316px;
            top: 87.8518px;
            left: 59px;
        }

        #HEADLINE24>.ladi-headline,
        #HEADLINE28>.ladi-headline,
        #HEADLINE32>.ladi-headline,
        #HEADLINE34>.ladi-headline,
        #HEADLINE36>.ladi-headline,
        #HEADLINE38>.ladi-headline,
        #HEADLINE51>.ladi-headline,
        #HEADLINE53>.ladi-headline {
            font-size: 13px;
        }

        #POPUP8,
        #POPUP9,
        #POPUP10 {
            width: 420px;
            height: 539px;
        }

        #IMAGE78,
        #IMAGE78>.ladi-image>.ladi-image-background,
        #IMAGE79,
        #IMAGE79>.ladi-image>.ladi-image-background,
        #IMAGE80,
        #IMAGE80>.ladi-image>.ladi-image-background {
            width: 412px;
            height: 532.304px;
        }

        #IMAGE78,
        #IMAGE79,
        #IMAGE80 {
            top: 3px;
            left: 4px;
        }

        #IMAGE78>.ladi-image>.ladi-image-background,
        #IMAGE79>.ladi-image>.ladi-image-background,
        #IMAGE80>.ladi-image>.ladi-image-background {
            background-image: url("../w.ladicdn.com/s750x850/5e9ebf43b17ed933fa24046b/z4066254579376_a18c1912d4468eb9b19c88dab4da0a7e-20230131013837-gqgo6.jpg");
        }

        #IMAGE81 {
            top: 18.4101px;
            left: -159px;
        }

        #IMAGE82 {
            top: 22.682px;
            left: -285.593px;
        }

        #IMAGE83 {
            top: 11.7165px;
            left: -389.348px;
        }

        #HEADLINE47 {
            width: 156px;
        }

        #HEADLINE47>.ladi-headline {
            font-size: 12px;
            text-align: center;
        }
    }
</style>
<style id="style_lazyload" type="text/css">
    body.lazyload .ladi-overlay,
    body.lazyload .ladi-box,
    body.lazyload .ladi-button-background,
    body.lazyload .ladi-collection-item:before,
    body.lazyload .ladi-countdown-background,
    body.lazyload .ladi-form-item-background,
    body.lazyload .ladi-form-label-container .ladi-form-label-item.image,
    body.lazyload .ladi-frame-background,
    body.lazyload .ladi-gallery-view-item,
    body.lazyload .ladi-gallery-control-item,
    body.lazyload .ladi-headline,
    body.lazyload .ladi-image-background,
    body.lazyload .ladi-image-compare,
    body.lazyload .ladi-list-paragraph ul li:before,
    body.lazyload .ladi-section-background,
    body.lazyload .ladi-survey-option-background,
    body.lazyload .ladi-survey-option-image,
    body.lazyload .ladi-tabs-background,
    body.lazyload .ladi-video-background,
    body.lazyload .ladi-banner,
    body.lazyload .ladi-spin-lucky-screen,
    body.lazyload .ladi-spin-lucky-start {
        background-image: none !important;
    }
</style>
<style type="text/css">
    @-webkit-keyframes bounce {

        0%,
        100%,
        20%,
        50%,
        80% {
            -webkit-transform: translateY(0);
            transform: translateY(0);
        }

        40% {
            -webkit-transform: translateY(-30px);
            transform: translateY(-30px);
        }

        60% {
            -webkit-transform: translateY(-15px);
            transform: translateY(-15px);
        }
    }

    @keyframes bounce {

        0%,
        100%,
        20%,
        50%,
        80% {
            -webkit-transform: translateY(0);
            -ms-transform: translateY(0);
            transform: translateY(0);
        }

        40% {
            -webkit-transform: translateY(-30px);
            -ms-transform: translateY(-30px);
            transform: translateY(-30px);
        }

        60% {
            -webkit-transform: translateY(-15px);
            -ms-transform: translateY(-15px);
            transform: translateY(-15px);
        }
    }

    @-webkit-keyframes flash {

        0%,
        100%,
        50% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }

    @keyframes flash {

        0%,
        100%,
        50% {
            opacity: 1;
        }

        25%,
        75% {
            opacity: 0;
        }
    }
</style>
<style>
.high-res-image {
width: 100%;
height: 100%;
image-rendering: -webkit-optimize-contrast; /* Safari */
image-rendering: -moz-crisp-edges;          /* Firefox */
image-rendering: -o-crisp-edges;            /* Opera */
image-rendering: crisp-edges;               /* CSS3 Spec */
image-rendering: pixelated;                 /* Upcoming Spec */
}
</style>