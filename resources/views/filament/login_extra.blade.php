
<style>
body {
    background: rgb(34,193,195) !important;
    background: linear-gradient(0deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%)  !important;;
}

.fi-logo {
    display: none !important;
}

@media screen and (max-width: 768px) {
    .fi-logo {
        display: none !important;
    }

    /* Hide admin card on mobile */
    .admin-welcome-card {
        display: none !important;
    }

    main {
        position: relative !important;
        right: auto !important;
        width: 100% !important;
        max-width: 400px;
        margin: 2rem auto 0;
        padding: 1.5rem;
    }

    main:before {
        content: "";
        position: absolute;
        top: -10px;
        left: -10px;
        right: -10px;
        bottom: -10px;
        background: linear-gradient(135deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0.1) 100%);
        border-radius: 25px;
        z-index: -1;
        backdrop-filter: blur(20px);
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
    }

    /* Enhanced mobile login card */
    main > div {
        background: rgba(255, 255, 255, 0.95) !important;
        border-radius: 20px !important;
        padding: 2.5rem 2rem !important;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15) !important;
        border: 1px solid rgba(255, 255, 255, 0.4) !important;
        backdrop-filter: blur(20px) !important;
    }

    /* Mobile login header */
    main h1 {
        text-align: center;
        margin-bottom: 2rem;
        color: #2d3748;
        font-size: 2rem !important;
        font-weight: bold;
        background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    /* Mobile form styling */
    .fi-input-wrp {
        margin-bottom: 1.5rem;
    }

    .fi-input {
        padding: 1rem 1.2rem !important;
        border-radius: 15px !important;
        border: 2px solid rgba(34,193,195, 0.2) !important;
        background: rgba(255, 255, 255, 0.8) !important;
        font-size: 1rem !important;
        transition: all 0.3s ease !important;
    }

    .fi-input:focus {
        border-color: rgba(34,193,195, 0.6) !important;
        box-shadow: 0 0 0 4px rgba(34,193,195, 0.1) !important;
        background: rgba(255, 255, 255, 0.95) !important;
    }

    /* Mobile button styling */
    .fi-btn {
        width: 100% !important;
        padding: 1rem 2rem !important;
        font-size: 1.1rem !important;
        font-weight: 600 !important;
        border-radius: 15px !important;
        background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%) !important;
        border: none !important;
        color: white !important;
        box-shadow: 0 10px 25px rgba(34,193,195, 0.3) !important;
        transition: all 0.3s ease !important;
        margin-top: 1rem !important;
    }

    .fi-btn:hover {
        transform: translateY(-2px) !important;
        box-shadow: 0 15px 35px rgba(34,193,195, 0.4) !important;
    }

    /* Mobile labels */
    .fi-fo-field-wrp-label {
        color: #4a5568 !important;
        font-weight: 600 !important;
        margin-bottom: 0.5rem !important;
        font-size: 0.95rem !important;
    }

    /* Mobile logo area */
    .fi-simple-header {
        text-align: center;
        margin-bottom: 2rem;
    }

    .fi-simple-header::before {
        content: "🍽️";
        display: block;
        font-size: 3rem;
        margin-bottom: 1rem;
        padding: 1rem;
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        border-radius: 20px;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 15px 30px rgba(34,193,195, 0.3);
    }

    /* Mobile error messages */
    .fi-fo-field-wrp-error-message {
        color: #e53e3e !important;
        font-size: 0.85rem !important;
        margin-top: 0.5rem !important;
    }

    /* Mobile remember me */
    .fi-checkbox {
        margin: 1.5rem 0 !important;
    }
}

@media screen and (min-width: 1024px) {
    main {
        position: absolute; right: 50px;
    }

    main:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: darkcyan;
        border-radius: 12px;
        z-index: -9;

        /*box-shadow: -50px 80px 4px 10px #555;*/
        -webkit-transform: rotate(7deg);
        -moz-transform: rotate(7deg);
        -o-transform: rotate(7deg);
        -ms-transform: rotate(7deg);
        transform: rotate(7deg);
    }
    
    .fi-logo {
        display: none !important;
    }

    /* Admin Welcome Card */
    .admin-welcome-card {
        position: fixed;
        left: 5%;
        top: 5%;
        width: 40%;
        max-width: 480px;
        background: rgba(255, 255, 255, 0.92);
        backdrop-filter: blur(15px);
        border-radius: 25px;
        padding: 3rem;
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.15);
        z-index: 10;
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    .card-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .hero-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        border-radius: 20px;
        margin: 0 auto 1.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 2.5rem;
        box-shadow: 0 15px 30px rgba(34,193,195, 0.4);
    }

    .admin-welcome-card h2 {
        color: #2d3748;
        font-size: 2.4em;
        font-weight: bold;
        margin-bottom: 1rem;
        background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }

    .admin-welcome-card p {
        color: #4a5568;
        font-size: 1.1em;
        line-height: 1.6;
        margin-bottom: 2rem;
    }

    .feature-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 1.5rem;
        margin: 2rem 0;
    }

    .feature-card {
        background: linear-gradient(135deg, rgba(255,255,255,0.8) 0%, rgba(249,250,251,0.9) 100%);
        border-radius: 15px;
        padding: 1.5rem;
        text-align: center;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        border: 1px solid rgba(34,193,195, 0.2);
        box-shadow: 0 5px 15px rgba(34,193,195, 0.1);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 35px rgba(34,193,195, 0.25);
        border: 1px solid rgba(34,193,195, 0.3);
    }

    .feature-icon {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, rgba(34,193,195,1) 0%, rgba(253,187,45,1) 100%);
        border-radius: 12px;
        margin: 0 auto 1rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        color: white;
        box-shadow: 0 8px 20px rgba(34,193,195, 0.3);
    }

    .feature-title {
        font-size: 0.95rem;
        font-weight: 600;
        color: #2d3748;
        margin: 0;
    }

    .welcome-stats {
        display: flex;
        justify-content: space-between;
        margin-top: 2.5rem;
        padding-top: 2rem;
        border-top: 2px solid rgba(34,193,195, 0.2);
    }

    .stat-item {
        text-align: center;
        flex: 1;
    }

    .stat-icon {
        width: 40px;
        height: 40px;
        background: linear-gradient(135deg, rgba(253,187,45,1) 0%, rgba(34,193,195,1) 100%);
        border-radius: 50%;
        margin: 0 auto 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        color: white;
        box-shadow: 0 8px 20px rgba(253,187,45, 0.4);
    }

    .stat-number {
        font-size: 1.4em;
        font-weight: bold;
        color: #2d3748;
        margin: 0.5rem 0 0.25rem;
    }

    .stat-label {
        font-size: 0.85em;
        color: #718096;
        font-weight: 500;
    }

    #slogan {
        display: none;
    }
}

</style>

<div class="admin-welcome-card">
    <div class="card-header">
        <div class="hero-icon">🍽️</div>
        <h2>Forse Yönetim Paneli</h2>
        <p>QR Menü yönetim sistemi ile restoranınızı dijital dünyaya taşıyın</p>
    </div>
    
    <div class="feature-grid">
        <div class="feature-card">
            <div class="feature-icon">📋</div>
            <h3 class="feature-title">Menü Yönetimi</h3>
        </div>
        <div class="feature-card">
            <div class="feature-icon">🧮</div>
            <h3 class="feature-title">Basit Arayüz</h3>
        </div>
    </div>
    
    <div class="welcome-stats">
        <div class="stat-item">
            <div class="stat-icon">⚡</div>
            <div class="stat-number">7/24</div>
            <div class="stat-label">Aktif</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">🔒</div>
            <div class="stat-number">100%</div>
            <div class="stat-label">Güvenli</div>
        </div>
        <div class="stat-item">
            <div class="stat-icon">🚀</div>
            <div class="stat-number">∞</div>
            <div class="stat-label">Sınırsız</div>
        </div>
    </div>
</div>