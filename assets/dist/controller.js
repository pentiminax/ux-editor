import { Controller } from '@hotwired/stimulus';
import Checklist from '@editorjs/checklist'
import Header from '@editorjs/header';
import Quote from '@editorjs/quote';
import Table from '@editorjs/table';

class default_1 extends Controller {
    async connect() {
        const data = await this.loadData();

        const payload = this.viewValue;

        const options = {
            data: data,
            tools: {
                checklist: Checklist,
                header: Header,
                quote: Quote,
                table: Table,
            },
            ...payload
        };

        this.editor = new EditorJS(options);
    }

    async loadData() {
        const data = localStorage.getItem('editor');

        return data ? JSON.parse(data) : {};
    }

    async save() {
        const data = await this.editor.save();

        console.log(data);

        localStorage.setItem('editor', JSON.stringify(data));
    }
}

default_1.values = {
    view: Object,
};

export default default_1;