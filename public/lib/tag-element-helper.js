class TagElementHelper {
    /**
     * Create ul list from array
     * @param {string} caption
     * @param {string[]} data an array of strings
     * @return {string} HTML markup with <ul> and <li> elements
     */
    createList(caption, data) {
        let list = `<h6>${caption}</h6><ul>`;
        data.forEach(item => {
            list += `<li>${item}</li>`;
        });
        list += `</ul>`;
        return list;
    }

    /**
     * Create table from array
     * @param {string} caption
     * @param {string[]} columns an array of strings
     * @param {string[][]} rows an array of arrays of strings
     * @return {string} HTML markup with <table> and <tr> elements
     */
    createTable(caption, columns, rows) {
        let table = `<div class='w-100 table-responsive'>`;
        table += `<table class='table table-bordered table-responsive w-100 table-hover table-sm'><caption>${caption}</caption><thead><tr>`;
        columns.forEach(column => {
            table += `<th>${column}</th>`;
        });
        table += `</tr></thead><tbody>`;
        rows.forEach(row => {
            table += `<tr>`;
            row.forEach(cell => {
                table += `<td>${cell}</td>`;
            });
            table += `</tr>`;
        });
        table += `</tbody></table>`;
        table += `</div>`;
        return table;
    }

    /**
     * Create Bootstrap Collapse
     * @link https://getbootstrap.com/docs/4.6/components/collapse/
     * @param {string} caption
     * @param {string} tagElement
     * @return {string} HTML markup with <div> and <button> elements
     */
    createBootstrapCollapse(caption, tagElement) {
        const id = this.generateID();
        const collapse = `<div class='collapse' id='${id}'>${tagElement}</div>`;
        const button = `<button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#${id}' aria-expanded='false' aria-controls='${id}'>${caption}</button>`;
        return collapse + button;
    }

    /**
     * Create Title
     * @param {string} title
     * @return {string} HTML markup with <h6> element
     */
    createTitle(title) {
        return `<h6>${title}</h6>`;
    }

    /**
     * Create Flex Row
     * @param {string} caption
     * @param {string[]} childElement an array of strings or HTML elements
     * @return {string} HTML markup with <div> elements
     */
    createFlexRow(caption, childElement) {
        let flex = this.createTitle(caption);
        flex += `<div class='w-100 d-flex flex-row flex-wrap' style='gap:24px;'>`;
        childElement.forEach(element => {
            flex += `<div>${element}</div>`;
        });
        flex += `</div>`;
        return flex;
    }

    /**
     * Create Grid Row
     * @param {string} caption
     * @param {number} gridColumn
     * @param {string[]} childElement an array of strings or HTML elements
     * @return {string} HTML markup with <div> elements
     */
    createGridRow(caption, gridColumn, childElement) {
        let grid = `<h6>${caption}</h6>`;
        grid += `<div class='row'>`;
        childElement.forEach(element => {
            grid += `<div class='col-md-${gridColumn}'>${element}</div>`;
        });
        grid += `</div>`;
        return grid;
    }

    /**
     * Create Paragraph
     * @param {string} text
     * @return {string} HTML markup with <p> element
     */
    createParagraph(text) {
        return `<p>${text}</p>`;
    }

    /**
     * Create Code JSON
     * @param {string} caption
     * @param {Object} data
     * @return {string} HTML markup with <pre> element containing JSON and a Bootstrap collapse component
     */
    createCodeJson(caption, data) {
        const json = JSON.stringify(data, null, 4); // Pretty print JSON with 4 spaces
        const element = `<pre>${json}</pre>`;
        return this.createBootstrapCollapse(caption, element);
    }

    /**
     * Create Bootstrap Badge
     * @param {string} severity is one of 'primary', 'secondary', 'success', 'danger', 'warning', 'info', 'light', 'dark'
     * @param {string} text is the text of the badge
     * @return {string} HTML markup with <span> element
     */
    createBootstrapBadge(severity, text) {
        return `<span class='badge badge-${severity}'>${text}</span>`;
    }

    /**
     * Create Bootstrap Blockquote
     * @param {string} text
     * @param {string} credit
     * @param {string} align is one of 'left', 'right', 'center'
     * @return {string} HTML markup with <blockquote> element
     */
    createBoostrapBlockquote(text, credit, align = 'left') {
        return `<blockquote class='blockquote text-${align}'><p class='mb-0'>${text}</p><footer class='blockquote-footer'>${credit}</footer></blockquote>`;
    }

    /**
     * Create Deleted Text
     * @param {string} text
     * @return {string} HTML markup with <del> element
     */
    createDeletedText(text) {
        return `<del>${text}</del>`;
    }

    /**
     * Create underline text
     * @param {string} text
     * @return {string} HTML markup with <u> element
     */
    createUnderlineText(text) {
        return `<u>${text}</u>`;
    }

    /**
     * Create strong text
     * @param {string} text
     * @return {string} HTML markup with <strong> element
     */
    createBoldText(text) {
        return `<strong>${text}</strong>`;
    }

    /**
     * Create italic text
     * @param {string} text
     * @return {string} HTML markup with <em> element
     */
    createItalicText(text) {
        return `<em>${text}</em>`;
    }

    /**
     * Generate a unique ID
     * @return {string} A unique ID
     */
    generateID() {
        return 'id-' + Math.random().toString(36).substr(2, 9);
    }
}