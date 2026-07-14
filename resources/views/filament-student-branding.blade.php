<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<style>
:root {
    --color-navy: #091c3d; --color-crimson: #c1121f; --color-gold: #f5a524;
    --bg: #f8fafc; --bg-card: #fff; --border: #e2e8f0; --border-hover: #cbd5e1;
    --text: #0f172a; --text-muted: #64748b; --text-light: #94a3b8;
    --accent: #091c3d; --accent-hover: #071433; --accent-light: #eef0f7;
    --crimson: #c1121f; --crimson-hover: #9e0e19; --crimson-light: #fdf2f2;
    --gold: #f5a524; --gold-light: #fef7e6;
    --shadow-sm: 0 1px 2px rgba(15,23,42,.05);
    --shadow-md: 0 4px 12px rgba(15,23,42,.08);
    --shadow-lg: 0 12px 28px rgba(15,23,42,.12);
    --radius-sm: 6px; --radius-md: 10px; --radius-lg: 16px;
    --sidebar-w: 260px;
}
body { font-family: 'Inter', system-ui, sans-serif !important; background: var(--bg); color: var(--text); }

/* ===== FILAMENT CHROME HIDE ===== */
.fi-sidebar, .fi-sidebar-close-overlay, .fi-main-sidebar { display: none !important; }
.fi-topbar-ctn, nav.fi-topbar, .fi-topbar { display: none !important; }
.fi-header, .fi-page-header-main-ctn > header, .fi-header-heading, .fi-header-subheading { display: none !important; }
.fi-page, .fi-page-main, .fi-page-content, .fi-page-header-main-ctn { padding: 0 !important; max-width: 100% !important; width: 100% !important; }
div.fi-main-ctn { margin: 0 !important; padding: 0 !important; max-width: 100% !important; width: 100% !important; }
main.fi-main { padding: 0 !important; max-width: 100% !important; width: 100% !important; margin: 0 !important; }

/* ===== LAYOUT ===== */
#dash { min-height: 100vh; background: var(--bg); color: var(--text); position: relative; }
#dash [x-cloak] { display: none !important; }
* { box-sizing: border-box; }

.dash-sidebar {
    position: fixed; left: 0; top: 0; bottom: 0; width: var(--sidebar-w);
    background: var(--bg-card); border-right: 1px solid var(--border);
    z-index: 40; display: none; flex-direction: column;
    overflow-y: auto; overflow-x: hidden;
}
@media (min-width: 1024px) { .dash-sidebar { display: flex; } }
.dash-sidebar.mobile-open { display: flex !important; z-index: 50; }

.dash-main { flex: 1; margin-left: 0; min-height: 100vh; }
@media (min-width: 1024px) { .dash-main { margin-left: var(--sidebar-w); } }

/* ===== SIDEBAR ===== */
.sidebar-header { padding: 16px; border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: center; text-decoration: none; }
.sidebar-logo-img { height: 60px; width: auto; max-width: 100%; object-fit: contain; }

.sidebar-nav { flex: 1; padding: 12px 8px; overflow-y: auto; }
.sidebar-section { margin-bottom: 8px; }
.sidebar-section-label { font-size: 10px; font-weight: 700; text-transform: uppercase; letter-spacing: .08em; color: var(--text-light); padding: 8px 12px 4px; }
.sidebar-link { display: flex; align-items: center; gap: 10px; padding: 10px 12px; border-radius: 8px; font-size: 13px; font-weight: 500; color: var(--text-muted); text-decoration: none; transition: all .15s; }
.sidebar-link:hover { background: var(--accent-light); color: var(--accent); }
.sidebar-link.active { background: var(--accent-light); color: var(--accent); font-weight: 600; }
.sidebar-link i { width: 18px; text-align: center; font-size: 13px; }
.sidebar-footer { padding: 12px 8px; border-top: 1px solid var(--border); }

/* ===== MOBILE TOGGLE ===== */
.mobile-toggle { display: flex; position: fixed; top: 14px; left: 14px; z-index: 60; width: 40px; height: 40px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 10px; align-items: center; justify-content: center; color: var(--text); box-shadow: var(--shadow-md); cursor: pointer; }
@media (min-width: 1024px) { .mobile-toggle { display: none; } }
.mobile-overlay { display: none; position: fixed; inset: 0; background: rgba(15,23,42,.4); z-index: 35; backdrop-filter: blur(2px); }
.mobile-overlay.open { display: block; }

/* ===== HEADER ===== */
.dash-header { position: sticky; top: 0; z-index: 30; height: 64px; background: var(--bg-card); border-bottom: 1px solid var(--border); display: flex; align-items: center; justify-content: space-between; padding: 0 24px; box-shadow: var(--shadow-sm); }
.header-left { display: flex; align-items: center; gap: 16px; }
.header-title { font-size: 16px; font-weight: 700; color: var(--text); }
.header-search { display: none; position: relative; width: 100%; max-width: 420px; }
@media (min-width: 768px) { .header-search { display: block; } }
.header-search input { width: 100%; height: 40px; padding: 0 16px 0 44px; background: var(--bg); border: 1px solid var(--border); border-radius: 20px; font-size: 13px; color: var(--text); outline: none; transition: all .15s; }
.header-search input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-light); }
.header-search i { position: absolute; left: 14px; top: 50%; transform: translateY(-50%); color: var(--text-light); font-size: 13px; }
.header-right { display: flex; align-items: center; gap: 8px; }
.header-btn { width: 40px; height: 40px; border-radius: 10px; display: flex; align-items: center; justify-content: center; color: var(--text-muted); background: transparent; border: none; cursor: pointer; transition: all .15s; }
.header-btn:hover { background: var(--bg); color: var(--text); }
.header-avatar { width: 32px; height: 32px; border-radius: 50%; object-fit: cover; border: 2px solid var(--border); flex-shrink: 0; }
.header-profile-btn { position: relative; display: flex; align-items: center; }
.header-profile-btn button { border: none; background: none; font-family: inherit; }
.header-profile-dropdown { position: absolute; right: 0; top: 100%; margin-top: 8px; min-width: 200px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; box-shadow: var(--shadow-lg); z-index: 50; padding: 6px 0; }
.header-profile-dropdown a, .header-profile-dropdown button { font-size: 13px; }

/* ===== NOTIFICATION DROPDOWN ===== */
.header-notif-btn { position: relative; display: flex; align-items: center; }
.notif-badge { position: absolute; top: 4px; right: 4px; min-width: 16px; height: 16px; background: var(--crimson); color: #fff; font-size: 9px; font-weight: 700; border-radius: 999px; display: flex; align-items: center; justify-content: center; padding: 0 4px; pointer-events: none; line-height: 1; }
.notif-dropdown { position: absolute; right: 0; top: 100%; margin-top: 8px; width: 360px; background: var(--bg-card); border: 1px solid var(--border); border-radius: 12px; box-shadow: var(--shadow-lg); z-index: 50; overflow: hidden; }
.notif-dropdown-header { display: flex; align-items: center; justify-content: space-between; padding: 14px 16px; border-bottom: 1px solid var(--border); }
.notif-dropdown-title { font-size: 14px; font-weight: 700; color: var(--text); }
.notif-dropdown-count { font-size: 11px; font-weight: 600; color: var(--crimson); background: var(--crimson-light); padding: 2px 8px; border-radius: 999px; }
.notif-dropdown-body { max-height: 340px; overflow-y: auto; }
.notif-item { display: flex; align-items: flex-start; gap: 10px; padding: 12px 16px; text-decoration: none; transition: background .15s; border-bottom: 1px solid var(--border); }
.notif-item:last-child { border-bottom: none; }
.notif-item:hover { background: var(--bg); }
.notif-unread { background: var(--accent-light); }
.notif-unread:hover { background: #dde0f0; }
.notif-item-dot { width: 8px; height: 8px; border-radius: 50%; flex-shrink: 0; margin-top: 5px; }
.notif-item-body { flex: 1; min-width: 0; }
.notif-item-title { font-size: 13px; font-weight: 600; color: var(--text); margin-bottom: 2px; line-height: 1.3; }
.notif-item-meta { font-size: 12px; color: var(--text-muted); display: -webkit-box; -webkit-line-clamp: 1; -webkit-box-orient: vertical; overflow: hidden; }
.notif-item-time { font-size: 10px; color: var(--text-light); margin-top: 4px; }
.notif-empty { text-align: center; padding: 32px 16px; color: var(--text-light); }
.notif-empty i { font-size: 28px; margin-bottom: 8px; display: block; }
.notif-empty p { font-size: 13px; margin: 0; }
.notif-view-all { display: flex; align-items: center; justify-content: center; gap: 6px; padding: 12px 16px; font-size: 12px; font-weight: 600; color: var(--accent); text-decoration: none; border-top: 1px solid var(--border); transition: background .15s; }
.notif-view-all:hover { background: var(--accent-light); }

/* ===== SECTION CARDS ===== */
.dash-section-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 20px; overflow: hidden; transition: box-shadow .2s; }
.dash-section-card:hover { box-shadow: var(--shadow-sm); }
.dash-section-card + .dash-section-card { margin-top: 24px; }

/* ===== MAIN CONTENT ===== */
.dash-content { padding: 24px; max-width: 1400px; margin: 0 auto; }

/* ===== SECTION ===== */
.section-header { display: flex; align-items: center; justify-content: space-between; margin-bottom: 16px; }
.section-title { font-size: 16px; font-weight: 700; color: var(--text); margin: 0; }
.section-link { font-size: 13px; font-weight: 600; color: var(--accent); text-decoration: none; transition: color .15s; }
.section-link:hover { text-decoration: underline; }

/* ===== EMPTY STATES ===== */
.empty-state { text-align: center; padding: 48px 24px; color: var(--text-light); }
.empty-state i { font-size: 40px; margin-bottom: 12px; display: block; }
.empty-state h3 { font-size: 15px; font-weight: 600; color: var(--text); margin: 0 0 4px; }
.empty-state p { font-size: 13px; margin: 0; }

/* ===== SCROLLBAR ===== */
::-webkit-scrollbar { width: 6px; height: 6px; }
::-webkit-scrollbar-track { background: transparent; }
::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
::-webkit-scrollbar-thumb:hover { background: var(--border-hover); }

/* ===== REDUCED MOTION ===== */
@media (prefers-reduced-motion: reduce) { *, *::before, *::after { animation-duration: .01ms !important; transition-duration: .01ms !important; } }

/* ===== FILAMENT OVERRIDES ===== */
.fi-wi-stats-overview-card { border-radius: 1rem !important; box-shadow: 0 1px 3px rgba(0,0,0,0.06) !important; border: 1px solid #e2e8f0 !important; transition: all 0.2s ease !important; }
.fi-wi-stats-overview-card:hover { box-shadow: 0 4px 12px rgba(9,28,61,0.1) !important; border-color: #091c3d !important; }
.fi-wi-stats-overview-value { font-weight: 800 !important; }
.fi-section { border-radius: 0.75rem !important; box-shadow: 0 1px 3px rgba(0,0,0,0.04) !important; border: 1px solid #e2e8f0 !important; }
.fi-ta-ctn { border-radius: 0.75rem !important; overflow: hidden !important; }
.fi-btn { border-radius: 0.5rem !important; font-weight: 600 !important; }
.fi-dropdown-list { border-radius: 0.75rem !important; }
.fi-input { border-radius: 0.5rem !important; }

/* ===== FORCE LIGHT THEME (no dark mode) ===== */
.fi-fo-field-wrp-label, .fi-fo-field-wrp-hint { color: var(--text); }
.fi-schema { color: var(--text); }
.fi-input, .fi-select-input, textarea.fi-input {
    background: #fff !important;
    color: var(--text) !important;
}
.fi-select-input option { color: var(--text); background: #fff; }
.fi-ta-ctn, .fi-ta-row { background: var(--bg-card) !important; }
.fi-ta-cell { color: var(--text) !important; }

/* ===== PAGE STATS ROW ===== */
.stats-row { display: grid; grid-template-columns: repeat(2, 1fr); gap: 12px; margin-bottom: 24px; }
@media (min-width: 768px) { .stats-row { grid-template-columns: repeat(4, 1fr); } }
.stat-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px 20px; display: flex; align-items: center; gap: 14px; transition: all .2s; }
.stat-card:hover { border-color: var(--accent); box-shadow: var(--shadow-md); }
.stat-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
.stat-info { flex: 1; min-width: 0; }
.stat-value { font-size: 22px; font-weight: 700; color: var(--text); line-height: 1.1; }
.stat-label { font-size: 12px; color: var(--text-muted); margin-top: 2px; }

/* ===== RESOURCE ITEM (premium card list) ===== */
.resource-list { display: flex; flex-direction: column; gap: 10px; }
.resource-item { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 16px; display: flex; align-items: center; gap: 16px; transition: all .2s; text-decoration: none; }
.resource-item:hover { border-color: var(--accent); box-shadow: var(--shadow-md); }
.resource-item-icon { width: 44px; height: 44px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
.resource-item-body { flex: 1; min-width: 0; }
.resource-item-title { font-size: 14px; font-weight: 600; color: var(--text); margin: 0 0 2px; }
.resource-item-meta { font-size: 12px; color: var(--text-muted); display: flex; align-items: center; gap: 12px; flex-wrap: wrap; }
.resource-item-badge { font-size: 10px; font-weight: 600; padding: 3px 8px; border-radius: 6px; text-transform: capitalize; flex-shrink: 0; }
.resource-item-action { font-size: 12px; font-weight: 600; white-space: nowrap; flex-shrink: 0; }
.resource-item-action a, .resource-item-action button { background: var(--crimson); color: #fff; padding: 7px 14px; border-radius: 8px; font-size: 11px; font-weight: 600; border: none; cursor: pointer; text-decoration: none; transition: all .15s; }
.resource-item-action a:hover, .resource-item-action button:hover { background: var(--crimson-hover); }

/* ===== PROFILE PAGE ===== */
.profile-grid { display: grid; grid-template-columns: 1fr; gap: 24px; }
@media (min-width: 768px) { .profile-grid { grid-template-columns: 300px 1fr; } }
.profile-card { background: var(--bg-card); border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; transition: box-shadow .2s; }
.profile-card:hover { box-shadow: var(--shadow-sm); }
.profile-card-header { padding: 16px 20px; border-bottom: 1px solid var(--border); display: flex; align-items: center; gap: 8px; }
.profile-card-title { font-size: 14px; font-weight: 700; color: var(--text); margin: 0; display: flex; align-items: center; gap: 8px; }
.profile-card-title i { color: var(--text-light); font-size: 14px; }
.profile-card-body { padding: 20px; }
.profile-avatar-wrap { text-align: center; padding: 28px 20px 24px; }
.profile-avatar { width: 100px; height: 100px; border-radius: 50%; object-fit: cover; border: 3px solid var(--accent); outline: 3px solid var(--accent-light); margin: 0 auto 14px; display: block; transition: transform .2s; }
.profile-avatar:hover { transform: scale(1.03); }
.profile-avatar-upload { display: inline-flex; align-items: center; gap: 6px; background: var(--accent); color: #fff; font-size: 11px; font-weight: 600; padding: 7px 16px; border-radius: 8px; cursor: pointer; transition: all .15s; border: none; font-family: inherit; }
.profile-avatar-upload:hover { background: var(--accent-hover); }
.profile-field { margin-bottom: 18px; }
.profile-field:last-child { margin-bottom: 0; }
.profile-label { display: block; font-size: 11px; font-weight: 600; color: var(--text-muted); text-transform: uppercase; letter-spacing: .05em; margin-bottom: 6px; }
.profile-value { font-size: 14px; font-weight: 500; color: var(--text); padding: 10px 14px; background: var(--bg); border-radius: 8px; border: 1px solid var(--border); }
.profile-input { width: 100%; height: 42px; padding: 0 14px; background: var(--bg); border: 1px solid var(--border); border-radius: 8px; font-size: 13px; color: var(--text); outline: none; transition: all .15s; font-family: inherit; }
.profile-input:focus { border-color: var(--accent); box-shadow: 0 0 0 3px var(--accent-light); }
.profile-summary { text-align: center; padding: 14px 8px; background: var(--bg); border-radius: var(--radius-md); border: 1px solid var(--border); transition: all .2s; }
.profile-summary:hover { border-color: var(--accent); }
.profile-summary-value { font-size: 22px; font-weight: 800; color: var(--accent); line-height: 1.2; }
.profile-summary-label { font-size: 10px; color: var(--text-muted); margin-top: 3px; font-weight: 500; text-transform: uppercase; letter-spacing: .04em; }
.profile-submit { background: var(--crimson) !important; }
.profile-submit:hover { background: var(--crimson-hover) !important; }
</style>
