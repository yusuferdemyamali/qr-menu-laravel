# Prompt Template: Generate Task List

## Purpose
Oluşturulacak görev listesi, proje planlamasını kolaylaştırmak için kullanılacak.  
Çıktı: To-do list, milestone, sprint planı.

---

## Input Variables
- **${project_brief}** : Projenin genel özeti ve hedefleri  
- **${client_requirements}** : Müşterinin fonksiyonel ve fonksiyonel olmayan gereksinimleri  
- **${technical_specifications}** : Projede kullanılacak teknolojiler, mimari, performans, güvenlik vb.

---

## Instructions
1. **Analyze Inputs:**  
   - ${project_brief} ile projenin kapsamını netleştir  
   - ${client_requirements} ile hangi fonksiyonlar ve özellikler gerekli belirle  
   - ${technical_specifications} ile hangi teknolojiler ve altyapı kullanılacağını göz önünde bulundur  

2. **Break Down into Tasks:**  
   - Büyük fonksiyonları küçük, uygulanabilir görevlere böl  
   - Her görevin önceliğini, tahmini süresini ve bağımlılıklarını belirt  

3. **Group Tasks by Milestones / Sprints:**  
   - Sprint 1: Temel kurulum, altyapı ve core functionality  
   - Sprint 2: Müşteri dashboard ve UI/UX implementasyonu  
   - Sprint 3: Integrations, security, performance optimizations  
   - Sprint 4: Testing, bug fixes, deployment preparation  

4. **Output Format:**  
   - Görevler listelenmiş şekilde, hangi sprint/milestone’a ait olduğu belirtilmiş  
   - Opsiyonel olarak tahmini süre (örn. 2 gün, 5 saat) ve bağımlılıklar  

---

## Example Output Structure

**Milestone / Sprint 1:** Backend Setup
- Task: Laravel projesini kur  
  - Estimated Time: 2 hours  
  - Dependencies: None
- Task: Database migrations & seeders  
  - Estimated Time: 3 hours  
  - Dependencies: Laravel setup  

**Milestone / Sprint 2:** Frontend & UX
- Task: Design mockups implement  
  - Estimated Time: 5 hours  
  - Dependencies: Completed backend API  

**Milestone / Sprint 3:** Security & Performance
- Task: Authentication & authorization implementation  
- Task: Caching & query optimization  

**Milestone / Sprint 4:** Testing & Deployment
- Task: Unit & feature tests  
- Task: Deploy to staging environment  
- Task: Performance and security audit  

---

## Notes
- Görevler **her projeye uyarlanabilir** olmalı  
- Yeni projelerde sadece `${project_brief}`, `${client_requirements}` ve `${technical_specifications}` değerleri değiştirilecek  
- Output, proje yöneticisi ve geliştirme ekibi tarafından kolayca kullanılabilir olmalı
