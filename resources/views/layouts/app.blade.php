<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('description', 'Zulhusni Adam - Programmer at ProtectHealth.')">

    <title>@yield('title', 'Zulhusni Adam') | Programmer</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=space-grotesk:400,500,600,700|inter:400,500,600|jetbrains-mono:400,500&display=swap" rel="stylesheet">

    <style>
        /*
         * Design tokens
         * Background  #07050F -> #0D0A1A  (deep violet-black)
         * Surface     #130F24 / #1B1533
         * Accent      #8B5CF6 (purple), gradient #7C3AED -> #A855F7 -> #D946EF
         * Text        #F4F1FF (primary), #A79FC4 (muted)
         */
        :root {
            --bg: #07050F;
            --bg-2: #0D0A1A;
            --surface: #130F24;
            --surface-2: #1B1533;
            --border: #2A2148;
            --border-strong: #3D2F6B;
            --text: #F4F1FF;
            --muted: #A79FC4;
            --purple: #8B5CF6;
            --purple-deep: #7C3AED;
            --purple-light: #C4B5FD;
            --fuchsia: #D946EF;
            --success: #34D399;
            --gradient: linear-gradient(135deg, #7C3AED 0%, #A855F7 50%, #D946EF 100%);
            --gradient-text: linear-gradient(120deg, #C4B5FD 0%, #A855F7 50%, #E879F9 100%);
            --glow: 0 10px 40px -10px rgba(168, 85, 247, 0.55);
            --radius-lg: 22px;
            --radius-md: 14px;
            --font-display: 'Space Grotesk', ui-sans-serif, system-ui, sans-serif;
            --font-body: 'Inter', ui-sans-serif, system-ui, sans-serif;
            --font-mono: 'JetBrains Mono', ui-monospace, monospace;
        }

        * { box-sizing: border-box; margin: 0; padding: 0; }

        html { scroll-behavior: smooth; scroll-padding-top: 90px; }

        body {
            font-family: var(--font-body);
            background: var(--bg);
            color: var(--text);
            line-height: 1.65;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* Ambient gradient backdrop with a subtle grid */
        body::before {
            content: "";
            position: fixed;
            inset: 0;
            background:
                radial-gradient(800px 500px at 10% -5%, rgba(124, 58, 237, 0.35), transparent 60%),
                radial-gradient(700px 500px at 95% 10%, rgba(217, 70, 239, 0.22), transparent 60%),
                radial-gradient(600px 400px at 50% 110%, rgba(139, 92, 246, 0.2), transparent 60%);
            pointer-events: none;
            z-index: -2;
        }
        body::after {
            content: "";
            position: fixed;
            inset: 0;
            background-image:
                linear-gradient(rgba(139, 92, 246, 0.05) 1px, transparent 1px),
                linear-gradient(90deg, rgba(139, 92, 246, 0.05) 1px, transparent 1px);
            background-size: 56px 56px;
            mask-image: radial-gradient(ellipse at center, #000 30%, transparent 75%);
            pointer-events: none;
            z-index: -1;
        }

        ::selection { background: rgba(168, 85, 247, 0.45); color: #fff; }
        a { color: inherit; text-decoration: none; }
        :focus-visible { outline: 2px solid var(--purple-light); outline-offset: 3px; border-radius: 6px; }

        .container { width: min(1140px, 92%); margin: 0 auto; }
        main { flex: 1; }

        /* Navigation */
        header {
            position: sticky;
            top: 0;
            z-index: 50;
            backdrop-filter: blur(16px) saturate(140%);
            -webkit-backdrop-filter: blur(16px) saturate(140%);
            background: rgba(7, 5, 15, 0.72);
            border-bottom: 1px solid var(--border);
        }
        .nav { display: flex; align-items: center; justify-content: space-between; flex-wrap: wrap; gap: 0.75rem 1.5rem; min-height: 68px; padding: 0.75rem 0; }
        .brand {
            font-family: var(--font-display);
            font-weight: 700; font-size: 1.1rem; letter-spacing: -0.02em;
            display: flex; align-items: center; gap: 0.6rem;
        }
        .brand-dot {
            width: 10px; height: 10px; border-radius: 3px;
            background: var(--gradient);
            box-shadow: 0 0 14px rgba(168, 85, 247, 0.8);
            transition: transform .4s ease;
        }
        .brand:hover .brand-dot { transform: rotate(135deg) scale(1.1); }

        .nav-links { display: flex; gap: 0.25rem; font-size: 0.93rem; font-weight: 500; }
        .nav-links a {
            position: relative; padding: 0.5rem 0.9rem; border-radius: 10px;
            color: var(--muted); transition: color .2s ease, background .2s ease;
        }
        .nav-links a::after {
            content: ""; position: absolute; left: 50%; bottom: 2px; width: 0; height: 2px;
            transform: translateX(-50%); border-radius: 2px; background: var(--gradient);
            transition: width .25s ease;
        }
        .nav-links a:hover { color: var(--text); background: rgba(139, 92, 246, 0.08); }
        .nav-links a:hover::after,
        .nav-links a.active::after { width: 60%; }
        .nav-links a.active { color: var(--purple-light); }

        /* Buttons */
        .btn {
            position: relative; overflow: hidden;
            display: inline-flex; align-items: center; justify-content: center; gap: 0.5rem;
            padding: 0.8rem 1.4rem; border-radius: 999px;
            font-family: var(--font-display); font-weight: 600; font-size: 0.95rem; letter-spacing: 0.01em;
            border: 1px solid transparent; cursor: pointer;
            transition: transform .25s ease, box-shadow .25s ease, background .25s ease, border-color .25s ease, color .25s ease;
        }
        .btn::before {
            content: ""; position: absolute; top: 0; left: -75%; width: 50%; height: 100%;
            background: linear-gradient(120deg, transparent, rgba(255, 255, 255, 0.35), transparent);
            transform: skewX(-20deg); transition: left .6s ease;
        }
        .btn:hover::before { left: 130%; }
        .btn:hover { transform: translateY(-3px); }
        .btn:active { transform: translateY(-1px) scale(0.98); }

        .btn-primary {
            background: var(--gradient); color: #fff;
            box-shadow: 0 12px 30px -12px rgba(168, 85, 247, 0.8);
        }
        .btn-primary:hover { box-shadow: 0 18px 40px -10px rgba(217, 70, 239, 0.75); }

        .btn-outline {
            color: var(--purple-light); border-color: var(--border-strong); background: rgba(139, 92, 246, 0.06);
        }
        .btn-outline:hover { border-color: var(--purple); background: rgba(139, 92, 246, 0.16); color: #fff; }

        .btn-ghost { color: var(--text); border-color: var(--border); background: var(--surface); }
        .btn-ghost:hover { border-color: var(--border-strong); background: var(--surface-2); }

        /* Hero */
        .hero { padding: 7rem 0 6rem; display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 4rem; align-items: center; }
        .badge {
            display: inline-flex; align-items: center; gap: 0.55rem;
            padding: 0.42rem 0.95rem; border-radius: 999px;
            background: rgba(139, 92, 246, 0.1); border: 1px solid var(--border-strong);
            font-size: 0.85rem; font-weight: 500; color: var(--purple-light);
        }
        .status-dot { width: 8px; height: 8px; border-radius: 50%; background: var(--success); box-shadow: 0 0 12px var(--success); }
        .hero h1 {
            margin-top: 1.5rem;
            font-family: var(--font-display);
            font-size: clamp(2.7rem, 6.2vw, 4.9rem);
            font-weight: 700;
            letter-spacing: -0.035em;
            line-height: 1.02;
        }
        .gradient-text {
            background: var(--gradient-text);
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        .lead { margin-top: 1.5rem; font-size: 1.15rem; color: var(--muted); max-width: 36rem; }
        .lead strong { color: var(--text); font-weight: 600; }
        .hero-actions { margin-top: 2.25rem; display: flex; flex-wrap: wrap; gap: 0.9rem; }

        /* Terminal card */
        .terminal {
            background: rgba(19, 15, 36, 0.85);
            border: 1px solid var(--border-strong);
            border-radius: var(--radius-lg);
            box-shadow: 0 30px 80px -25px rgba(124, 58, 237, 0.45), inset 0 1px 0 rgba(255, 255, 255, 0.04);
            overflow: hidden;
            transition: transform .4s ease, box-shadow .4s ease;
        }
        .terminal:hover { transform: translateY(-6px) rotate(-0.4deg); box-shadow: 0 40px 90px -25px rgba(217, 70, 239, 0.45); }
        .terminal-bar { display: flex; gap: 7px; padding: 0.9rem 1.05rem; border-bottom: 1px solid var(--border); }
        .terminal-bar span { width: 11px; height: 11px; border-radius: 50%; background: var(--surface-2); }
        .terminal-bar span:nth-child(1) { background: #F472B6; }
        .terminal-bar span:nth-child(2) { background: #A855F7; }
        .terminal-bar span:nth-child(3) { background: #7C3AED; }
        .terminal-body { padding: 1.5rem; font-family: var(--font-mono); font-size: 0.88rem; line-height: 1.95; color: var(--muted); }
        .terminal-body .prompt { color: var(--fuchsia); }
        .terminal-body .key { color: var(--purple-light); }
        .terminal-body .str { color: #F0ABFC; }
        .cursor { display: inline-block; width: 8px; height: 1em; background: var(--purple-light); vertical-align: middle; animation: blink 1.1s steps(1) infinite; }
        @keyframes blink { 50% { opacity: 0; } }

        /* Inner page header */
        .page-hero { padding: 6rem 0 1rem; }
        .page-hero .back { display: inline-flex; gap: .4rem; color: var(--muted); font-size: .9rem; margin-bottom: 1.5rem; transition: color .2s ease, transform .2s ease; }
        .page-hero .back:hover { color: var(--purple-light); transform: translateX(-4px); }

        /* Sections */
        section { padding: 5rem 0; position: relative; }
        .section-label {
            display: inline-flex; align-items: center; gap: 0.6rem;
            font-family: var(--font-mono); font-size: 0.8rem; letter-spacing: 0.1em; text-transform: uppercase;
            color: var(--purple-light);
        }
        .section-label::before { content: ""; width: 26px; height: 2px; border-radius: 2px; background: var(--gradient); }
        .section-title {
            margin-top: 0.8rem;
            font-family: var(--font-display);
            font-size: clamp(2rem, 3.8vw, 2.7rem); font-weight: 700; letter-spacing: -0.025em; line-height: 1.12;
        }
        .section-desc { margin-top: 1rem; color: var(--muted); max-width: 40rem; }

        /* About */
        .about-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 3rem; align-items: start; margin-top: 3rem; }
        .about-grid p { color: var(--muted); margin-bottom: 1.1rem; }
        .stats { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1rem; }
        .stat {
            padding: 1.5rem; border-radius: var(--radius-md);
            background: linear-gradient(160deg, var(--surface-2), var(--surface));
            border: 1px solid var(--border);
            transition: transform .3s ease, border-color .3s ease, box-shadow .3s ease;
        }
        .stat:hover { transform: translateY(-4px); border-color: var(--border-strong); box-shadow: var(--glow); }
        .stat strong {
            display: block; font-family: var(--font-display);
            font-size: 1.6rem; font-weight: 700; letter-spacing: -0.02em;
            background: var(--gradient-text); -webkit-background-clip: text; background-clip: text; color: transparent;
        }
        .stat span { font-size: 0.85rem; color: var(--muted); }

        /* Focus cards */
        .cards { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; margin-top: 3rem; }
        .card {
            position: relative; padding: 2rem; border-radius: var(--radius-lg);
            background: linear-gradient(160deg, rgba(27, 21, 51, 0.9), rgba(19, 15, 36, 0.9));
            border: 1px solid var(--border);
            transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease;
            overflow: hidden;
        }
        .card::before {
            content: ""; position: absolute; inset: 0; opacity: 0; transition: opacity .35s ease;
            background: radial-gradient(400px circle at var(--mx, 50%) var(--my, 0%), rgba(168, 85, 247, 0.18), transparent 60%);
        }
        .card:hover { transform: translateY(-6px); border-color: rgba(168, 85, 247, 0.5); box-shadow: var(--glow); }
        .card:hover::before { opacity: 1; }
        .icon {
            width: 48px; height: 48px; border-radius: 14px; display: grid; place-items: center;
            background: var(--gradient); color: #fff;
            font-family: var(--font-mono); font-weight: 700; margin-bottom: 1.4rem;
            box-shadow: 0 8px 20px -8px rgba(168, 85, 247, 0.8);
            transition: transform .35s ease;
        }
        .card:hover .icon { transform: rotate(-8deg) scale(1.08); }
        .card h3 { font-family: var(--font-display); font-size: 1.2rem; font-weight: 600; margin-bottom: 0.5rem; }
        .card p { color: var(--muted); font-size: 0.95rem; }

        /* Projects */
        .projects { display: grid; grid-template-columns: repeat(3, 1fr); gap: 1.25rem; margin-top: 3rem; }
        .project {
            display: flex; flex-direction: column; border-radius: var(--radius-lg); overflow: hidden;
            background: var(--surface); border: 1px solid var(--border);
            transition: transform .35s ease, border-color .35s ease, box-shadow .35s ease;
        }
        .project:hover { transform: translateY(-8px); border-color: rgba(217, 70, 239, 0.45); box-shadow: 0 25px 50px -20px rgba(168, 85, 247, 0.55); }
        .project-thumb {
            position: relative; height: 160px; overflow: hidden;
            background: var(--gradient);
        }
        .project-thumb::after {
            content: ""; position: absolute; inset: 0;
            background-image: linear-gradient(rgba(255,255,255,0.12) 1px, transparent 1px), linear-gradient(90deg, rgba(255,255,255,0.12) 1px, transparent 1px);
            background-size: 22px 22px; opacity: .5;
            transition: transform .6s ease;
        }
        .project:hover .project-thumb::after { transform: scale(1.12); }
        .project-thumb span {
            position: absolute; left: 1.2rem; bottom: 1rem; z-index: 1;
            font-family: var(--font-mono); font-size: .8rem; color: rgba(255,255,255,.9);
        }
        .project-body { padding: 1.5rem; display: flex; flex-direction: column; flex: 1; }
        .project h3 { font-family: var(--font-display); font-size: 1.2rem; font-weight: 600; }
        .project p { margin-top: 0.5rem; color: var(--muted); font-size: 0.93rem; flex: 1; }
        .project-tags { display: flex; flex-wrap: wrap; gap: 0.45rem; margin-top: 1.1rem; }
        .project-tags .tag { font-size: .78rem; padding: .3rem .6rem; }
        .project-links { display: flex; gap: 1.1rem; margin-top: 1.25rem; font-size: .9rem; font-weight: 600; }
        .project-links a { color: var(--purple-light); transition: color .2s ease, letter-spacing .2s ease; }
        .project-links a:hover { color: var(--fuchsia); letter-spacing: 0.02em; }

        /* Tags */
        .tags { display: flex; flex-wrap: wrap; gap: 0.65rem; margin-top: 3rem; }
        .tag {
            padding: 0.5rem 0.95rem; border-radius: 10px; font-size: 0.88rem;
            font-family: var(--font-mono); color: var(--purple-light);
            background: rgba(139, 92, 246, 0.08); border: 1px solid var(--border);
            transition: transform .2s ease, border-color .2s ease, background .2s ease, color .2s ease;
        }
        .tag:hover { transform: translateY(-3px); border-color: var(--purple); background: rgba(139, 92, 246, 0.18); color: #fff; }

        /* Contact */
        .contact-card {
            position: relative; overflow: hidden;
            padding: 4.5rem 2.5rem; border-radius: 28px; text-align: center;
            background: linear-gradient(135deg, rgba(124, 58, 237, 0.22), rgba(217, 70, 239, 0.12));
            border: 1px solid var(--border-strong);
        }
        .contact-card::before {
            content: ""; position: absolute; width: 420px; height: 420px; border-radius: 50%;
            background: radial-gradient(circle, rgba(217, 70, 239, 0.35), transparent 65%);
            top: -180px; right: -120px; pointer-events: none;
        }
        .contact-card .section-label { justify-content: center; }
        .contact-card .section-label::after { content: ""; width: 26px; height: 2px; border-radius: 2px; background: var(--gradient); }
        .contact-card::after { display: none; }
        .contact-card p { color: var(--muted); margin: 1rem auto 2.25rem; max-width: 32rem; }

        footer { border-top: 1px solid var(--border); padding: 2rem 0; color: var(--muted); font-size: 0.88rem; }
        .footer-inner { display: flex; justify-content: space-between; flex-wrap: wrap; gap: 1rem; }

        /* Entrance animation */
        .reveal { opacity: 0; transform: translateY(22px); animation: rise .9s cubic-bezier(.2,.7,.2,1) forwards; }
        .reveal.d1 { animation-delay: .1s; }
        .reveal.d2 { animation-delay: .25s; }
        .reveal.d3 { animation-delay: .4s; }
        @keyframes rise { to { opacity: 1; transform: none; } }

        /* Responsive */
        @media (max-width: 960px) {
            .projects { grid-template-columns: repeat(2, 1fr); }
        }
        @media (max-width: 880px) {
            .hero { grid-template-columns: 1fr; padding-top: 4rem; }
            .about-grid { grid-template-columns: 1fr; }
            .cards { grid-template-columns: 1fr; }
        }
        @media (max-width: 640px) {
            .projects { grid-template-columns: 1fr; }
            .stats { grid-template-columns: 1fr; }
            .nav-links { order: 3; width: 100%; justify-content: center; flex-wrap: wrap; }
            .contact-card { padding: 3rem 1.5rem; }
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
        <a href="{{ route('home') }}" class="brand"><span class="brand-dot"></span>zulhusni.adam</a>
        <div class="nav-links">
            <a href="{{ route('about') }}" class="{{ request()->routeIs('about') ? 'active' : '' }}">About</a>
            <a href="{{ route('focus') }}" class="{{ request()->routeIs('focus') ? 'active' : '' }}">Focus</a>
            <a href="{{ route('stack') }}" class="{{ request()->routeIs('stack') ? 'active' : '' }}">Stack</a>
            <a href="{{ route('contact') }}" class="{{ request()->routeIs('contact') ? 'active' : '' }}">Contact</a>
        </div>
        <a href="{{ route('contact') }}" class="btn btn-outline">Get in touch</a>
    </nav>
</header>

<main>
    @yield('content')
</main>

<footer>
    <div class="container footer-inner">
        <span>&copy; {{ date('Y') }} Zulhusni Adam. All rights reserved.</span>
        <span>Programmer &middot; ProtectHealth</span>
    </div>
</footer>

<script>
    document.querySelectorAll('.card').forEach((card) => {
        card.addEventListener('pointermove', (event) => {
            const rect = card.getBoundingClientRect();
            card.style.setProperty('--mx', `${event.clientX - rect.left}px`);
            card.style.setProperty('--my', `${event.clientY - rect.top}px`);
        });
    });
</script>

</body>
</html>
