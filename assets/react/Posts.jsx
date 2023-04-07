import React from 'react';
import {createRoot} from 'react-dom/client'

function Posts()
{
    return <h2>Hellow react</h2>
}


class PostsElement extends HTMLElement {
connectedCallback(){
    const root = createRoot(this)
    root.render(<Posts/>)
}

}
customElements.define('posts-component',PostsElement)