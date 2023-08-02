const maxWordsCount = 400;

function countWords(str) {

    if (str == '') {
        return 0;
    }

    return str.trim().split(/\s+/).length;
}