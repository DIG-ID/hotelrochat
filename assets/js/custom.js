document.addEventListener("DOMContentLoaded", () => {
    const form = document.getElementById("basel-search-form");
    const input = document.getElementById("basel-search-input");
    const resultsContainer = document.getElementById("basel-search-results");
  
    form.addEventListener("submit", function(e) {
      e.preventDefault();
  
      const query = input.value.trim();
      if (!query) return;
  
      resultsContainer.innerHTML = '<p class="text-sm text-gray-500">Suche läuft...</p>';
  
      fetch(`/wp-json/basel-erlebnis/v1/search?s=${encodeURIComponent(query)}`)
        .then(res => res.json())
        .then(data => {
          if (!data.length) {
            resultsContainer.innerHTML = '<p class="text-sm text-gray-500">Keine Ergebnisse gefunden.</p>';
          } else {
                const highlight = (text, term) => {
                const escapedTerm = term.replace(/[.*+?^${}()|[\]\\]/g, '\\$&'); // escape regex
                const regex = new RegExp(`(${escapedTerm})`, 'gi');
                return text.replace(regex, '<mark class="bg-yellow-200">$1</mark>');
                };
                
                resultsContainer.innerHTML = data.map(post => `
                <div>
                    <h3 class="font-prata text-[20px] text-gold mb-1">${highlight(post.title, query)}</h3>
                    <p class="text-sm mb-1">${highlight(post.excerpt, query)}</p>
                    <a href="${post.link}" class="text-sm text-blue-600 hover:underline">${post.link}</a>
                </div>
                `).join('');              
          }
        })
        .catch(() => {
          resultsContainer.innerHTML = '<p class="text-sm text-red-500">Fehler bei der Suche.</p>';
        });
    });
  });
  