import { Controller } from '@hotwired/stimulus';
import Header from '@editorjs/header';

class default_1 extends Controller {
    async connect() {
        const data = await this.loadData();

        const payload = this.viewValue;

        const options = {
            data: data,
            tools: {
                header: Header
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

        localStorage.setItem('editor', JSON.stringify(data));
    }
}

default_1.values = {
    view: Object,
};

export default default_1;