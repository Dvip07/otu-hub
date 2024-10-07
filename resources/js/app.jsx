// import '../css/app.css';
// import './bootstrap';

// import { createInertiaApp } from '@inertiajs/react';
// import { resolvePageComponent } from 'laravel-vite-plugin/inertia-helpers';
// import { createRoot } from 'react-dom/client';

// const appName = import.meta.env.VITE_APP_NAME || 'Laravel';

// createInertiaApp({
//     title: (title) => `${title} - ${appName}`,
//     resolve: (name) =>
//         resolvePageComponent(
//             `./Pages/${name}.jsx`,
//             import.meta.glob('./Pages/**/*.jsx'),
//         ),
//     setup({ el, App, props }) {
//         const root = createRoot(el);

//         root.render(<App {...props} />);
//     },
//     progress: {
//         color: '#4B5563',
//     },
// });

// resources/js/app.jsx

import React from 'react';
import { createRoot } from 'react-dom/client';
import { App } from '@inertiajs/inertia-react';
import { InertiaProgress } from '@inertiajs/progress';

// Optional: Import a global layout component if you have one
// import Layout from './Layouts/Layout';

const el = document.getElementById('app');

const root = createRoot(el);

root.render(
    <React.StrictMode>
        <App
            initialPage={JSON.parse(el.dataset.page)}
            resolveComponent={(name) => import(`./Pages/${name}`).then(module => module.default)}
        />
        <InertiaProgress />
    </React.StrictMode>
);
