/**
 * @author Lujie.Zhou(gao_lujie@live.cn, qq:821293064).
 */
/**
 * add favorite
 * @param sURL
 * @param sTitle
 * @constructor
 */
function addFavorite() {
    var url = window.location.hostname;
    var title = document.title;
    try {
        window.external.addFavorite(url, title);
    }
    catch (e) {
        try {
            window.sidebar.addPanel(title, url, "");
        }
        catch (e) {
            alert("加入收藏失败，请使用Ctrl+D进行添加");
        }
    }
}

$(function () {
});
