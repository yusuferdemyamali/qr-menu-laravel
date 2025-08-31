# Prompt Template: Breakdown Task Step by Step

## Purpose
Verilen tek bir görevi (task) adım adım alt görevlere bölmek ve her bir alt göreve tahmini süre atamak.  
Çıktı: Subtasks listesi + süre tahmini.

---

## Input Variables
- **Tek bir görev:** ${task_name} (Örn. "Authentication sistemi kur")

---

## Instructions
1. **Analyze Task:**  
   - Görevin amacı ve kapsamını belirle  
   - Hangi bileşenler ve alt sistemler görev kapsamında  

2. **Break Down Into Subtasks:**  
   - Görevi mantıksal adımlara böl (setup, implementation, test, documentation)  
   - Her alt görevin bağımlılıklarını belirt  

3. **Estimate Duration:**  
   - Her alt görev için tahmini süre (saat veya gün) ekle  
   - Karmaşıklık veya önceliğe göre süreleri ayarla  

4. **Output Format:**  
   - Sıralı liste  
   - Her alt görev: Description + Estimated Time + Dependencies (opsiyonel)

---

## Example Output Structure

**Task:** Authentication sistemi kur

**Step-by-Step Breakdown:**
1. Setup Laravel Authentication Package (Breeze / Fortify / Jetstream)  
   - Estimated Time: 1 hour  
   - Dependencies: None

2. Configure Database & User Model  
   - Estimated Time: 1 hour  
   - Dependencies: Step 1

3. Implement Registration & Login Functionality  
   - Estimated Time: 2 hours  
   - Dependencies: Step 2

4. Add Password Reset & Email Verification  
   - Estimated Time: 1.5 hours  
   - Dependencies: Step 3

5. Implement Role-Based Access Control (RBAC)  
   - Estimated Time: 2 hours  
   - Dependencies: Step 4

6. Write Unit & Feature Tests  
   - Estimated Time: 2 hours  
   - Dependencies: Step 5

7. Documentation & Deployment Notes  
   - Estimated Time: 0.5 hours  
   - Dependencies: Step 6

---

## Notes
- Şablon **her projeye uyarlanabilir**; sadece ${task_name} değiştirilecek  
- Alt görevler proje özelinde daha fazla detaylandırılabilir  
- Tahmini süreler projenin karmaşıklığına göre ayarlanabilir  
- Output, sprint planı ve task management araçlarına direkt eklenebilir
