# Prompt Template: Refine and Deploy

## Purpose
Mevcut proje kodunu ve dokümanları analiz ederek **deploy öncesi optimize edilmiş plan ve talimatlar** oluşturmak.  
Çıktı: Deployment planı, optimizasyon önerileri, ve adım adım talimatlar.

---

## Input Variables
- **${project_brief}** : Projenin genel özeti ve hedefleri  
- **${client_requirements}** : Müşterinin fonksiyonel ve fonksiyonel olmayan gereksinimleri  
- **${technical_specifications}** : Projede kullanılacak teknolojiler, mimari, performans ve güvenlik gereksinimleri  
- **mevcut kod** : Kod tabanı, konfigürasyon dosyaları ve veritabanı yapısı  

---

## Instructions
1. **Analyze Project:**  
   - Mevcut kod ve yapı ${project_brief}, ${client_requirements}, ${technical_specifications} ile karşılaştır  
   - Eksik veya iyileştirilebilir alanları belirle (performans, güvenlik, kod kalitesi)  

2. **Refine Code & Configuration:**  
   - Gereksiz bağımlılıkları kaldır  
   - Config ve .env dosyalarını optimize et  
   - Cache, queue, migrations ve database indexing kontrolleri  

3. **Generate Deployment Plan:**  
   - Environment setup (Dev/Staging/Production)  
   - Dependency installation ve version lock kontrolü  
   - Database migration ve seeding adımları  
   - Cache, config ve route optimizasyonları  
   - Security ve performance check list  

4. **Step-by-Step Deployment Instructions:**  
   - Sıralı adımlar halinde açık, uygulanabilir talimatlar  
   - Rollback ve backup prosedürleri dahil  
   - Post-deploy test ve monitoring adımları  

5. **Output Format:**  
   - Bölüm 1: Pre-Deployment Checklist  
   - Bölüm 2: Step-by-Step Deployment Instructions  
   - Bölüm 3: Post-Deployment Verification  
   - Opsiyonel: Riskler ve önerilen iyileştirmeler  

---

## Example Output Structure

**Pre-Deployment Checklist**
- Verify environment variables in `.env`  
- Ensure database credentials are correct  
- Run composer/npm install with version lock  

**Step-by-Step Deployment Instructions**
1. Backup existing database and files  
2. Pull latest code from repository  
3. Run `composer install` & `npm install`  
4. Run migrations: `php artisan migrate --force`  
5. Optimize cache: `php artisan config:cache && route:cache && view:cache`  
6. Restart queue workers & services  

**Post-Deployment Verification**
- Check application logs for errors  
- Test critical user flows (login, payment, data CRUD)  
- Monitor server performance and response times  

**Notes**
- Şablon **her projeye uyarlanabilir**, sadece input değiştirilecek  
- Output, DevOps veya teknik ekip tarafından direkt kullanılabilir  
- Deployment sırasında kritik adımların atlanmaması sağlanmalı
