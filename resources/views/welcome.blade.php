<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Zulhusni Adam - Programmer at ProtectHealth.">

    <title>Zulhusni Adam | Programmer</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700,800|jetbrains-mono:400,500&display=swap" rel="stylesheet">

    <style>
        :root {
            --bg: #0b0f1a;
            --surface: rgba(255, 255, 255, 0.04);
            --surface-hover: rgba(255, 255, 255, 0.08);
            --border: rgba(255, 255, 255, 0.09);
            --text: #e6e9f2;
            --muted: #9aa3b8;
            --accent: #22d3ee;
            --accent-2: #6366f1;
            --success: #34d399;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; }

        body {
            font-family: 'Inter', ui-sans-serif, system-ui, sans-serif;
            background: var(--bg);
            color: var(--text);
            line-height: 1.6;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
        }

        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                radial-gradient(900px 500px at 15% -10%, rgba(99, 102, 241, 0.22), transparent 60%),
                radial-gradient(800px 500px at 100% 0%, rgba(34, 211, 238, 0.14), transparent 60%);
            pointer-events: none;
            z-index: -1;
        }

        a { color: inherit; text-decoration: none; }

        .container { width: min(1120px, 92%); margin: 0 auto; }

        /* Navigation */
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(14px);
            background: rgba(11, 15, 26, 0.7);
            border-bottom: 1px solid var(--border);
        }
        .nav { display: flex; align-items: center; justify-content: space-between; height: 64px; }
        .brand { font-weight: 700; letter-spacing: -0.01em; display: flex; align-items: center; gap: 0.5rem; }
        .brand-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--accent); box-shadow: 0 0 12px var(--accent); }
        .nav-links { display: flex; gap: 1.75rem; font-size: 0.92rem; color: var(--muted); }
        .nav-links a:hover { color: var(--text); }

        /* Buttons */
        .btn {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.75rem 1.25rem; border-radius: 12px;
            font-weight: 600; font-size: 0.95rem;
            transition: transform .2s ease, background .2s ease, border-color .2s ease;
            border: 1px solid var(--border);
        }
        .btn:hover { transform: translateY(-2px); }
        .btn-primary {
            background: linear-gradient(135deg, var(--accent-2), var(--accent));
            border-color: transparent; color: #04111a;
            box-shadow: 0 10px 30px -10px rgba(34, 211, 238, 0.6);
        }
        .btn-ghost { background: var(--surface); }
        .btn-ghost:hover { background: var(--surface-hover); }

        /* Hero */
        .hero { padding: 7rem 0 6rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 4rem; align-items: center; }
        .badge {
            display: inline-flex; align-items: center; gap: 0.5rem;
            padding: 0.4rem 0.9rem; border-radius: 999px;
            background: var(--surface); border: 1px solid var(--border);
            font-size: 0.85rem; color: var(--muted);
        }
        .status-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--success); box-shadow: 0 0 10px var(--success); }
        .hero h1 {
            margin-top: 1.5rem;
            font-size: clamp(2.6rem, 6vw, 4.6rem);
            font-weight: 800;
            letter-spacing: -0.035em;
            line-height: 1.05;
        }
        .gradient-text {
            background: linear-gradient(120deg, #a5b4fc 0%, var(--accent) 60%, #67e8f9 100%);
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        .hero p.lead { margin-top: 1.5rem; font-size: 1.15rem; color: var(--muted); max-width: 36rem; }
        .hero-actions { margin-top: 2.25rem; display: flex; flex-wrap: wrap; gap: 0.9rem; }

        /* Terminal card */
        .terminal {
            background: rgba(15, 20, 35, 0.8);
            border: 1px solid var(--border);
            border-radius: 18px;
            box-shadow: 0 30px 60px -20px rgba(0, 0, 0, 0.6);
            overflow: hidden;
        }
        .terminal-bar { display: flex; gap: 6px; padding: 0.85rem 1rem; border-bottom: 1px solid var(--border); }
        .terminal-bar span { width: 11px; height: 11px; border-radius: 50%; background: rgba(255,255,255,0.15); }
        .terminal-body { padding: 1.5rem; font-family: 'JetBrains Mono', ui-monospace, monospace; font-size: 0.88rem; line-height: 1.9; color: var(--muted); }
        .terminal-body .prompt { color: var(--success); }
        .terminal-body .key { color: var(--accent); }
        .terminal-body .str { color: #fda4af; }
        .cursor { display: inline-block; width: 8px; height: 1em; background: var(--accent); vertical-align: middle; animation: blink 1.1s steps(1) infinite; }
        @keyframes blink { 50% { opacity: 0; } }

        /* Sections */
        section { padding: 5.5rem 0; }
        .section-label { font-family: 'JetBrains Mono', monospace; font-size: 0.85rem; color: var(--accent); letter-spacing: 0.08em; text-transform: uppercase; }
        .section-title { margin-top: 0.6rem; font-size: clamp(1.9rem, 3.5vw, 2.5rem); font-weight: 700; letter-spacing: -0.02em; }
        .section-desc { margin-top: 1rem; color: var(--muted); max-width: 40rem; }

        /* About */
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start; margin-top: 3rem; }
        .about-grid p { color: var(--muted); margin-bottom: 1.1rem; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
        .stat { padding: 1.5rem; border-radius: 16px; background: var(--surface); border: 1px solid var(--border); }
        .stat strong { display: block; font-size: 1.9rem; font-weight: 800; letter-spacing: -0.02em; }
        .stat span { font-size: 0.85rem; color: var(--muted); }

        /* Cards */
        .cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; margin-top: 3rem; }
        .card {
            padding: 1.9rem; border-radius: 18px;
            background: var(--surface); border: 1px solid var(--border);
            transition: transform .25s ease, background .25s ease, border-color .25s ease;
        }
        .card:hover { transform: translateY(-4px); background: var(--surface-hover); border-color: rgba(34, 211, 238, 0.35); }
        .icon {
            width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center;
            background: linear-gradient(135deg, rgba(99,102,241,0.25), rgba(34,211,238,0.2));
            color: var(--accent); font-family: 'JetBrains Mono', monospace; font-weight: 700; margin-bottom: 1.25rem;
        }
        .card h3 { font-size: 1.15rem; font-weight: 600; margin-bottom: 0.5rem; }
        .card p { color: var(--muted); font-size: 0.95rem; }

        /* Tags */
        .tags { display: flex; flex-wrap: wrap; gap: 0.6rem; margin-top: 3rem; }
        .tag {
            padding: 0.45rem 0.9rem; border-radius: 10px; font-size: 0.88rem;
            font-family: 'JetBrains Mono', monospace; color: var(--muted);
            background: var(--surface); border: 1px solid var(--border);
        }

        /* Contact */
        .contact {
            margin-bottom: 5rem; padding: 4rem 2.5rem; border-radius: 26px; text-align: center;
            background: linear-gradient(135deg, rgba(99,102,241,0.18), rgba(34,211,238,0.10));
            border: 1px solid var(--border);
        }
        .contact p { color: var(--muted); margin: 1rem auto 2rem; max-width: 32rem; }

        footer { border-top: 1px solid var(--border); padding: 2rem 0; color: var(--muted); font-size: 0.88rem; }
        .footer-inner { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem; }

        /* Entrance animation */
        .reveal { opacity: 0; transform: translateY(20px); animation: rise .8s ease forwards; }
        .reveal.d1 { animation-delay: .1s; }
        .reveal.d2 { animation-delay: .25s; }
        .reveal.d3 { animation-delay: .4s; }
        @keyframes rise { to { opacity: 1; transform: none; } }

        /* Responsive */
        @media (max-width: 880px) {
            .hero { grid-template-columns: 1fr; padding-top: 4rem; }
            .about-grid { grid-template-columns: 1fr; }
            .cards { grid-template-columns: 1fr; }
            .nav-links { display: none; }
        }
        @media (prefers-reduced-motion: reduce) {
            *, *::before, *::after { animation: none !important; transition: none !important; }
            .reveal { opacity: 1; transform: none; }
        }
    </style>
</head>
<body>

<header>
    <nav class="container nav">
        <a href="#top" class="brand"><span class="brand-dot"></span>zulhusni.adam</a>
        <div class="nav-links">
            <a href="#about">About</a>
            <a href="#focus">Focus</a>
            <a href="#stack">Stack</a>
            <a href="#contact">Contact</a>
        </div>
        <a href="#contact" class="btn btn-ghost">Get in touch</a>
    </nav>
</header>

<main id="top">
    <div class="container hero">
        <div>
            <span class="badge reveal"><span class="status-dot"></span> Available for new projects</span>

            <h1 class="reveal d1">
                Hi, I'm <span class="gradient-text">Zulhusni Adam</span>
            </h1>

            <p class="lead reveal d2">
                Programmer at <strong style="color: var(--text);">ProtectHealth</strong>, building reliable,
                clean and user-focused software that solves real problems.
            </p>

            <div class="hero-actions reveal d3">
                <a href="#contact" class="btn btn-primary">Let's work together &rarr;</a>
                <a href="#about" class="btn btn-ghost">About me</a>
            </div>
        </div>

        <div class="terminal reveal d2" aria-hidden="true">
            <div class="terminal-bar"><span></span><span></span><span></span></div>
            <div class="terminal-body">
                <div><span class="prompt">~</span> whoami</div>
                <div>zulhusni adam</div>
                <div><span class="prompt">~</span> cat role.txt</div>
                <div><span class="key">role</span>: <span class="str">"programmer"</span></div>
                <div><span class="key">company</span>: <span class="str">"protecthealth"</span></div>
                <div><span class="key">focus</span>: <span class="str">"clean code, healthcare tech"</span></div>
                <div><span class="prompt">~</span> <span class="cursor"></span></div>
            </div>
        </div>
    </div>

    <section id="about">
        <div class="container">
            <div class="section-label">01 / About</div>
            <h2 class="section-title">Engineering with purpose</h2>

            <div class="about-grid">
                <div>
                    <p>
                        I'm a programmer at ProtectHealth, where I work on software that supports
                        health and wellbeing. I care about writing code that is easy to read,
                        easy to maintain and robust when it matters most.
                    </p>
                    <p>
                        My approach is simple: understand the problem first, keep the solution as
                        small as it needs to be, and test it properly before it ships.
                    </p>
                </div>

                <div class="stats">
                    <div class="stat"><strong>ProtectHealth</strong><span>Current company</span></div>
                    <div class="stat"><strong>Full-stack</strong><span>Development focus</span></div>
                    <div class="stat"><strong>Always</strong><span>Learning new tools</span></div>
                </div>
            </div>
        </div>
    </section>

    <section id="focus">
        <div class="container">
            <div class="section-label">02 / Focus</div>
            <h2 class="section-title">What I do</h2>
            <p class="section-desc">Practical software engineering, from the first idea to a product people rely on.</p>

            <div class="cards">
                <div class="card">
                    <div class="icon">&lt;/&gt;</div>
                    <h3>Web Applications</h3>
                    <p>Fast, accessible and maintainable web apps built with modern tooling and clean architecture.</p>
                </div>
                <div class="card">
                    <div class="icon">{ }</div>
                    <h3>Backend &amp; APIs</h3>
                    <p>Secure, well-structured server logic and APIs that are reliable under real-world load.</p>
                </div>
                <div class="card">
                    <div class="icon">+</div>
                    <h3>Healthcare Systems</h3>
                    <p>Software for health-focused products, designed with care for data quality and user trust.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="stack">
        <div class="container">
            <div class="section-label">03 / Stack</div>
            <h2 class="section-title">Tools I use</h2>

            <div class="tags">
                <span class="tag">PHP</span>
                <span class="tag">Laravel</span>
                <span class="tag">JavaScript</span>
                <span class="tag">Tailwind CSS</span>
                <span class="tag">Vite</span>
                <span class="tag">MySQL</span>
                <span class="tag">Git</span>
                <span class="tag">REST APIs</span>
            </div>
        </div>
    </section>

    <section id="contact">
        <div class="container">
            <div class="contact">
                <div class="section-label">04 / Contact</div>
                <h2 class="section-title">Let's build something together</h2>
                <p>Have a project, a question, or an opportunity? My inbox is open.</p>
                <a href="mailto:hello@example.com" class="btn btn-primary">Send an email</a>
            </div>
        </div>
    </section>
</main>

<footer>
    <div class="container footer-inner">
        <span>&copy; {{ date('Y') }} Zulhusni Adam. All rights reserved.</span>
        <span>Programmer &middot; ProtectHealth</span>
    </div>
</footer>

</body>
</html>
