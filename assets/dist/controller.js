import {Controller} from '@hotwired/stimulus';
import Checklist from '@editorjs/checklist'
import Code from '@editorjs/code'
import Embed from '@editorjs/embed'
import Header from '@editorjs/header';
import Image from '@editorjs/image';
import EditorjsList from '@editorjs/list';
import Quote from '@editorjs/quote';
import Table from '@editorjs/table';

class default_1 extends Controller {
    constructor() {
        super(...arguments);

        this.editor = null;
        this.isEditorInitialized = false;
    }
    async connect() {
        if (this.isEditorInitialized) {
            return;
        }

        window.addEventListener('beforeunload', async (e) => {
            await this.save();
        });

        const payload = this.viewValue;

        this.dispatchEvent('pre-connect', {
            config: payload
        });

        const data = await this.loadData(payload);

        const options = {
            data: data,
            tools: {},
            ...payload,
        };

        if (payload.checklist) {
            options.tools.checklist = Checklist;
        }

        if (payload.code) {
            options.tools.code = Code;
        }

        if (payload.embed) {
            options.tools.embed = Embed;
        }

        if (payload.header) {
            options.tools.header = {
                class: Header,
                ...payload.header
            }
        }

        if (payload.image) {
            options.tools.image = {
                class: Image,
                ...payload.image
            }
        }

        if (payload.list) {
            options.tools.list = {
                class: EditorjsList,
                ...payload.list
            }
        }

        if (payload.quote) {
            options.tools.quote = {
                class: Quote,
                ...payload.quote
            }
        }

        if (payload.table) {
            options.tools.table = {
                class: Table,
                ...payload.table
            }
        }

        this.editor = new EditorJS(options);
        this.saveDataUrl = payload.saveDataUrl || null;

        this.dispatchEvent('connect', {
            editor: this.editor
        });

        this.isEditorInitialized = true;
    }

    dispatchEvent(name, payload) {
        this.dispatch(name, {
            detail: payload,
            prefix: 'datatables'
        });
    }

    async loadData(payload) {
        let data = {};

        if (payload['dataUrl']) {
            const response = await fetch(dataUrl);

            data = await response.json();
        } else if (payload['blocks']) {
            let blocks = JSON.parse(payload['blocks']);
            data = { blocks: blocks };
        } else {
            data = JSON.parse(localStorage.getItem('editorContent')) || {};
        }

        return data;
    }

    async save() {
        const data = await this.editor.save();

        if (this.saveDataUrl) {
            const response = await fetch(this.saveDataUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(data),
            });

            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
        } else {
            localStorage.setItem('editorContent', JSON.stringify(data));
        }
    }
}


default_1.values = {
    view: Object,
};

export default default_1;