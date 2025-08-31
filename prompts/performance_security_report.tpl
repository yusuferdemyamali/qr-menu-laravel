# Prompt Template: Performance & Security Report

## Purpose
Mevcut proje dosyalarını analiz ederek, **performans ve güvenlik durumunu** değerlendirmek.  
Çıktı: Detaylı güvenlik ve performans raporu, öneriler ve riskler.

---

## Input Variables
- **${performance_goals}** : Projenin performans hedefleri (response time, concurrency, database, frontend vs.)  
- **${security_best_practices_laravel}** : Laravel projeleri için güvenlik standartları ve önerileri  
- **mevcut proje dosyaları** : Kod tabanı, konfigürasyon dosyaları ve veritabanı yapısı  

---

## Instructions
1. **Analyze Project Files:**  
   - Backend kodu, migrations, seeders, config dosyaları ve frontend dosyalarını kontrol et  
   - ${performance_goals} ile karşılaştır: database sorguları, caching, page load times, asset optimization  
   - ${security_best_practices_laravel} ile karşılaştır: authentication, authorization, input validation, XSS/CSRF, secrets management  

2. **Identify Issues & Risks:**  
   - Performans sorunları (örn. N+1 queries, büyük asset dosyaları)  
   - Güvenlik açıkları (örn. eksik CSRF koruması, zayıf parola politikası, secrets exposed)  

3. **Generate Recommendations:**  
   - Performans iyileştirme önerileri: caching, indexing, query optimization, lazy/eager loading  
   - Güvenlik iyileştirme önerileri: validation, encryption, HTTPS, headers, session security  
   - Deployment ve monitoring önerileri: CI/CD pipeline, logging, staging testleri  

4. **Output Format:**  
   - **Section 1: Performance Analysis**  
     - Detaylı analiz ve tespit edilen sorunlar  
     - Tahmini etki ve öncelik  
     - Önerilen çözümler  
   - **Section 2: Security Analysis**  
     - Detaylı analiz ve tespit edilen açıklar  
     - Tahmini risk seviyesi  
     - Önerilen çözümler  

---

## Example Output Structure

**Performance Analysis**
- Issue: N+1 query detected in UserController@index  
  - Impact: High, slows page load for >500 users  
  - Recommendation: Use eager loading, add index on `users.created_at`

**Security Analysis**
- Issue: CSRF token missing on form `/contact`  
  - Risk Level: Medium  
  - Recommendation: Add `@csrf` in Blade template  

**Summary**
- Overall performance: [Good / Needs Improvement / Critical]  
- Overall security: [Good / Needs Improvement / Critical]  
- Next Steps: Prioritize high-risk issues and performance bottlenecks

---

## Notes
- Şablon **her projeye uyarlanabilir**; sadece `${performance_goals}` ve `${security_best_practices_laravel}` güncellenecek  
- Mevcut proje dosyaları ile analiz sonucu **otomatik rapor üretilebilir**  
- Çıktı, proje yöneticisi veya teknik lider tarafından kolayca yorumlanabilir olmalı
