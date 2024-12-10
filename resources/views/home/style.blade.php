<style>
.bg-purple { background-color: #6f42c1 !important; /* Cor roxa */ }
body { font-family: Arial, Helvetica, sans-serif; background-color: white; margin: 0; display: flex; flex-direction: column; align-items: center; height: 100vh; }
.container { background-color: white; padding: 30px; border-radius: 15px; width: 90%; max-width: 800px; box-shadow: 0 0 20px rgba(0, 0, 0, 0.2); margin-top: 50px; color: white; }
.header-title { font-size: 32px; font-weight: bold; margin-bottom: 20px; color: #6f42c1}
.search-form { margin-bottom: 20px; }
.search-form input { width: 100%; padding: 10px; border: none; border-radius: 5px; margin-bottom: 10px; }
.search-form button { padding: 10px 20px; border: none; border-radius: 5px; background-color: #3498db; color: white; cursor: pointer; transition: background-color 0.3s ease; }
.search-form button:hover { background-color: #2980b9; }
.topic { margin-bottom: 30px; padding: 20px; background-color: rgba(255, 255, 255, 0.1); border-radius: 10px; transition: transform 0.3s ease; }
.topic:hover { transform: scale(1.05); }
.topic-title { font-size: 24px; font-weight: bold; margin-bottom: 10px; color: white; }
.topic-content { margin-bottom: 10px; color: white; }
.topic-meta { margin-bottom: 10px; color: white; }
.topic-text { margin-bottom: 10px; line-height: 1.5; color: white; }
.button { display: inline-block; padding: 10px 20px; border: none; cursor: pointer; border-radius: 5px; color: white; text-align: center; text-decoration: none; font-size: 14px; transition: background-color 0.3s ease; }
.button.edit { background-color: #656E8F; }
.button.like { background-color: #3498db; margin-left: 10px; }
.button.dislike { background-color: #e74c3c; margin-left: 10px; }
.button.comment { background-color: #656E8F; }
.comment { background-color: #EFEFEF; padding: 10px; margin-top: 10px; border-radius: 8px; }
.comment p { margin-bottom: 5px; color: white; }
textarea { width: 100%; border-radius: 5px; padding: 10px; box-sizing: border-box; resize: none; }
</style>