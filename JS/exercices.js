$(document).ready(function () {
  // Start of script


  // QCM
  fetch('./data/qcm.json')
  .then(response => response.json())
  .then(data => {
    const qcmContainer = document.getElementById('qcm-container');
    const questions = data.questions;
    
    // Mélanger les questions dans un ordre aléatoire
    const shuffledQuestions = questions.sort(() => Math.random() - 0.5);

    // Sélectionner les 8 premières questions dans le tableau mélangé
    const selectedQuestions = shuffledQuestions.slice(0, 8);

    let html = '';

    selectedQuestions.forEach((question, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">${question.question}</h5>
            <form>
              ${question.options.map((option, optionIndex) => `
                <div class="form-check">
                  <input class="form-check-input" type="radio" id="question-qcm-${index}-option-${optionIndex}" name="question-qcm-${index}" value="${optionIndex}">
                  <label class="form-check-label" for="question-qcm-${index}-option-${optionIndex}">${option}</label>
                </div>
              `).join('')}
            </form>
            <button class="btn btn-primary mt-3" id="check-answer-qcm-${index}">Vérifier la réponse</button>
            <div class="mt-2" id="answer-result-qcm-${index}"></div>
          </div>
        </div>
      `;
    });

    qcmContainer.innerHTML = html;

    selectedQuestions.forEach((question, index) => {
      const checkButton = document.getElementById(`check-answer-qcm-${index}`);
      const answerResult = document.getElementById(`answer-result-qcm-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedOptionIndex = document.querySelector(`input[name="question-qcm-${index}"]:checked`).value;
        const correctOptionIndex = question.answer;

        if (selectedOptionIndex == correctOptionIndex) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
          
          
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });
    });
  })
  .catch(error => console.error(error));


  //Chiffrement de César
  fetch('./data/cesar.json')
  .then(response => response.json())
  .then(data => {
    const chiffrementsContainer = document.getElementById('cesar-container');
    const chiffrements = data.chiffrements;

    // Mélanger les chiffrements dans un ordre aléatoire
    const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

    // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
    const selectedChiffrements = shuffledChiffrements.slice(0, 5);

    let html = '';

    selectedChiffrements.forEach((chiffrement, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title"><b>${chiffrement.type}</b> en utilisant l'algorithme de César ce message : </h5>
            <p class="card-text">${chiffrement.texte}</p>
            <p class="card-text">Clé : ${chiffrement.cle}</p>
            <div class="form-group">
              <label for="answer-cesar-${index}">Réponse:</label>
              <input type="text" class="form-control" id="answer-cesar-${index}">
            </div>
            <button class="btn btn-primary mt-3" id="check-answer-cesar-${index}">Vérifier la réponse</button>
            <div class="mt-2" id="answer-result-cesar-${index}"></div>
            <div class="mt-2" id="answer-cesar-${index}" style="display:none">${chiffrement.answer}</div>
          </div>
        </div>
      `;
    });

    chiffrementsContainer.innerHTML = html;

    selectedChiffrements.forEach((chiffrement, index) => {
      const checkButton = document.getElementById(`check-answer-cesar-${index}`);
      const answerResult = document.getElementById(`answer-result-cesar-${index}`);
      const answerInput = document.getElementById(`answer-cesar-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedAnswer = answerInput.value.toUpperCase().replace(/[^A-Z]/g, "");
        const correctAnswer = chiffrement.answer.toUpperCase().replace(/[^A-Z]/g, "");

        if (selectedAnswer === correctAnswer) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });
    });
  })
  .catch(error => console.error(error));

  // Chiffrement de Vigenere
  fetch('./data/vigenere.json')
  .then(response => response.json())
  .then(data => {
    const chiffrementsContainer = document.getElementById('vigenere-container');
    const chiffrements = data.chiffrements;

    // Mélanger les chiffrements dans un ordre aléatoire
    const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

    // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
    const selectedChiffrements = shuffledChiffrements.slice(0, 5);

    let html = '';

    selectedChiffrements.forEach((chiffrement, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title" ><b>${chiffrement.type}</b> en utilisant l'algorithme de Vigenere ce message : </h5>
            <p class="card-text">${chiffrement.texte}</p>
            <p class="card-text">Clé : ${chiffrement.cle}</p>
            <div class="form-group">
              <label for="answer-vigenere-${index}">Réponse:</label>
              <input type="text" class="form-control" id="answer-vigenere-${index}">
            </div>
            <button class="btn btn-primary mt-3" id="check-answer-vigenere-${index}">Vérifier la réponse</button>
            <div class="mt-2" id="answer-result-vigenere-${index}"></div>
            <div class="mt-2" id="answer-vigenere-${index}" style="display:none">${chiffrement.answer}</div>
          </div>
        </div>
      `;
    });

    chiffrementsContainer.innerHTML = html;

    selectedChiffrements.forEach((chiffrement, index) => {
      const checkButton = document.getElementById(`check-answer-vigenere-${index}`);
      const answerResult = document.getElementById(`answer-result-vigenere-${index}`);
      const answerInput = document.getElementById(`answer-vigenere-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedAnswer = answerInput.value.toUpperCase().replace(/[^A-Z]/g, "");
        const correctAnswer = chiffrement.answer.toUpperCase().replace(/[^A-Z]/g, "");

        if (selectedAnswer === correctAnswer) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });
    });
  })
  .catch(error => console.error(error));


  // Chiffrement d'Affine
  fetch('./data/affine.json')
  .then(response => response.json())
  .then(data => {
    const chiffrementsContainer = document.getElementById('affine-container');
    const chiffrements = data.chiffrements;

    // Mélanger les chiffrements dans un ordre aléatoire
    const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

    // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
    const selectedChiffrements = shuffledChiffrements.slice(0, 5);

    let html = '';

    selectedChiffrements.forEach((chiffrement, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title"><b>${chiffrement.type}</b> en utilisant l'algorithme d'Affine ce message : </h5>
            <p class="card-text">${chiffrement.texte}</p>
            <p class="card-text">Clé : ${chiffrement.cle}</p>
            <div class="form-group">
              <label for="answer-affine-${index}">Réponse:</label>
              <input type="text" class="form-control" id="answer-affine-${index}">
            </div>
            <button class="btn btn-primary mt-3" id="check-answer-affine-${index}">Vérifier la réponse</button>
            <div class="mt-2" id="answer-result-affine-${index}"></div>
            <div class="mt-2" id="answer-affine-${index}" style="display:none">${chiffrement.answer}</div>
          </div>
        </div>
      `;
    });

    chiffrementsContainer.innerHTML = html;

    selectedChiffrements.forEach((chiffrement, index) => {
      const checkButton = document.getElementById(`check-answer-affine-${index}`);
      const answerResult = document.getElementById(`answer-result-affine-${index}`);
      const answerInput = document.getElementById(`answer-affine-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedAnswer = answerInput.value.toUpperCase().replace(/[^A-Z]/g, "");
        const correctAnswer = chiffrement.answer.toUpperCase().replace(/[^A-Z]/g, "");

        if (selectedAnswer === correctAnswer) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });
    });
  })
  .catch(error => console.error(error));


  //Chiffrement de Playfair
  fetch('./data/playfair.json')
  .then(response => response.json())
  .then(data => {
    const chiffrementsContainer = document.getElementById('playfair-container');
    const chiffrements = data.chiffrements;

    // Mélanger les chiffrements dans un ordre aléatoire
    const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

    // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
    const selectedChiffrements = shuffledChiffrements.slice(0, 5);

    let html = '';

    selectedChiffrements.forEach((chiffrement, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title"><b>${chiffrement.type}</b> en utilisant l'algorithme de Playfair ce message : </h5>
            <p class="card-text">${chiffrement.texte}</p>
            <p class="card-text">Clé : ${chiffrement.cle}</p>
            <div class="form-group">
              <label for="answer-playfair-${index}">Réponse:</label>
              <input type="text" class="form-control" id="answer-playfair-${index}">
            </div>
            <button class="btn btn-primary mt-3" id="check-answer-playfair-${index}">Vérifier la réponse</button>
            <div class="mt-2" id="answer-result-playfair-${index}"></div>
            <div class="mt-2" id="answer-playfair-${index}" style="display:none">${chiffrement.answer}</div>
          </div>
        </div>
      `;
    });

    chiffrementsContainer.innerHTML = html;

    selectedChiffrements.forEach((chiffrement, index) => {
      const checkButton = document.getElementById(`check-answer-playfair-${index}`);
      const answerResult = document.getElementById(`answer-result-playfair-${index}`);
      const answerInput = document.getElementById(`answer-playfair-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedAnswer = answerInput.value.toUpperCase().replace(/[^A-Z]/g, "");
        const correctAnswer = chiffrement.answer.toUpperCase().replace(/[^A-Z]/g, "");

        if (selectedAnswer === correctAnswer) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });
    });
  })
  .catch(error => console.error(error));


  // TEST 1
  fetch('./data/test1.json')
  .then(response => response.json())
  .then(data => {
    const chiffrementsContainer = document.getElementById('test1-container');
    const chiffrements = data.chiffrements;

    // Mélanger les chiffrements dans un ordre aléatoire
    const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

    // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
    const selectedChiffrements = shuffledChiffrements.slice(0, 5);

    let html = '';

    selectedChiffrements.forEach((chiffrement, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Trouvez la clé de ce message chiffré avec <b>${chiffrement.type}</b>!</h5>
            <h6 class="card-text text-center"><strong>Texte en clair</strong></h6>
            <div class="card bg-warning bg-opacity-50 mb-3">
              <div class="card-body rounded">${chiffrement.texte_clair}</div>
            </div>
            <h6 class="card-text text-center"><strong>Texte chiffré</strong></h6>
            <div class="card bg-warning bg-opacity-50 mb-3">
              <div class="card-body rounded">${chiffrement.texte_chiffre}</div>
            </div>
            <div class="form-group">
              <label for="answer-test1-${index}">Réponse:</label>
              <input type="text" class="form-control" id="answer-test1-${index}">
            </div>
            <button class="btn btn-primary mt-3" id="check-answer-test1-${index}">Vérifier la réponse</button>
            <button class="btn btn-secondary mt-3" id="show-answer-test1-${index}">Voir la réponse</button>
            <div class="mt-2" id="answer-result-test1-${index}"></div>
            <div class="mt-2" id="spoiled-answer-test1-${index}" style="display:none">${chiffrement.answer}</div>
          </div>
        </div>
      `;
    });

    chiffrementsContainer.innerHTML = html;

    selectedChiffrements.forEach((chiffrement, index) => {
      const checkButton = document.getElementById(`check-answer-test1-${index}`);
      const showAnswerButton = document.getElementById(`show-answer-test1-${index}`);
      const answerResult = document.getElementById(`answer-result-test1-${index}`);
      const answerInput = document.getElementById(`answer-test1-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedAnswer = answerInput.value.toUpperCase();
        const correctAnswer = chiffrement.answer.toUpperCase();

        if (selectedAnswer === correctAnswer) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });

      showAnswerButton.addEventListener('click', () => {
        const answer = document.getElementById(`spoiled-answer-test1-${index}`);
        showAnswerButton.style.display = 'none';
        answer.style.display = 'block';
      });
    });
  })
  .catch(error => console.error(error));

 
  
  // TEST 2
  fetch('./data/test2.json')
  .then(response => response.json())
  .then(data => {
    const chiffrementsContainer = document.getElementById('test2-container');
    const chiffrements = data.chiffrements;

    // Mélanger les chiffrements dans un ordre aléatoire
    const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

    // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
    const selectedChiffrements = shuffledChiffrements.slice(0, 5);

    let html = '';

    selectedChiffrements.forEach((chiffrement, index) => {
      html += `
        <div class="card mb-3">
          <div class="card-body">
            <h5 class="card-title">Chiffrez ce message !</h5>
            <h6 class="card-text text-center"><strong>Texte en clair</strong></h6>
            <div class="card bg-warning bg-opacity-50 mb-3">
              <div class="card-body rounded">${chiffrement.texte_clair}</div>
            </div>
            <p class="card-text">Clé : <strong>${chiffrement.cle}</strong></p>
            <div class="form-group">
              <label for="answer-test2-${index}">Réponse:</label>
              <input type="text" class="form-control" id="answer-test2-${index}">
            </div>
            <button class="btn btn-primary mt-3" id="check-answer-test2-${index}">Vérifier la réponse</button>
            <div class="mt-2" id="answer-result-test2-${index}"></div>
            <div class="mt-2" id="answer-test2-${index}" style="display:none">${chiffrement.answer}</div>
          </div>
        </div>
      `;
    });

    chiffrementsContainer.innerHTML = html;

    selectedChiffrements.forEach((chiffrement, index) => {
      const checkButton = document.getElementById(`check-answer-test2-${index}`);
      const answerResult = document.getElementById(`answer-result-test2-${index}`);
      const answerInput = document.getElementById(`answer-test2-${index}`);

      checkButton.addEventListener('click', () => {
        const selectedAnswer = answerInput.value.toUpperCase().replace(/[^A-Z]/g, "");
        const correctAnswer = chiffrement.answer.toUpperCase().replace(/[^A-Z]/g, "");

        if (selectedAnswer === correctAnswer) {
          answerResult.innerHTML = "Bonne réponse !";
          answerResult.classList.remove("text-danger");
          answerResult.classList.add("text-success");
        } else {
          answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
          answerResult.classList.remove("text-success");
          answerResult.classList.add("text-danger");
        }
      });
    });
  })
  .catch(error => console.error(error));


 // TEST 3
 fetch('./data/test3.json')
 .then(response => response.json())
 .then(data => {
   const chiffrementsContainer = document.getElementById('test3-container');
   const chiffrements = data.chiffrements;

   // Mélanger les chiffrements dans un ordre aléatoire
   const shuffledChiffrements = chiffrements.sort(() => Math.random() - 0.5);

   // Sélectionner les 5 premiers chiffrements dans le tableau mélangé
   const selectedChiffrements = shuffledChiffrements.slice(0, 5);

   let html = '';

   selectedChiffrements.forEach((chiffrement, index) => {
     html += `
       <div class="card mb-3">
         <div class="card-body">
           <h5 class="card-title">Déchiffrez ce message !</h5>
           <h6 class="card-text text-center"><strong>Texte en clair</strong></h6>
           <div class="card bg-warning bg-opacity-50 mb-3">
             <div class="card-body rounded">${chiffrement.texte_chiffre}</div>
           </div>
           <p class="card-text">Clé : <strong>${chiffrement.cle}</strong></p>
           <div class="form-group">
             <label for="answer-test3-${index}">Réponse:</label>
             <input type="text" class="form-control" id="answer-test3-${index}">
           </div>
           <button class="btn btn-primary mt-3" id="check-answer-test3-${index}">Vérifier la réponse</button>
           <div class="mt-2" id="answer-result-test3-${index}"></div>
           <div class="mt-2" id="answer-test3-${index}" style="display:none">${chiffrement.answer}</div>
         </div>
       </div>
     `;
   });

   chiffrementsContainer.innerHTML = html;

   selectedChiffrements.forEach((chiffrement, index) => {
     const checkButton = document.getElementById(`check-answer-test3-${index}`);
     const answerResult = document.getElementById(`answer-result-test3-${index}`);
     const answerInput = document.getElementById(`answer-test3-${index}`);

     checkButton.addEventListener('click', () => {
       const selectedAnswer = answerInput.value.toUpperCase().replace(/[^A-Z]/g, "");
       const correctAnswer = chiffrement.answer.toUpperCase().replace(/[^A-Z]/g, "");

       if (selectedAnswer === correctAnswer) {
         answerResult.innerHTML = "Bonne réponse !";
         answerResult.classList.remove("text-danger");
         answerResult.classList.add("text-success");
       } else {
         answerResult.innerHTML = "Mauvaise réponse. Réessayez.";
         answerResult.classList.remove("text-success");
         answerResult.classList.add("text-danger");
       }
     });
   });
 })
 .catch(error => console.error(error));

  // End of script
});
