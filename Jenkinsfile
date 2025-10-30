// Jenkinsfile
pipeline {
    agent any
    
    stages {
        stage('Build') {
            steps {
                echo "Build stage is running"
                sh 'docker-compose build'
            }
        }
        
        stage('Test') {
            steps {
                echo "Test stage is running"
                sh 'docker-compose up -d'
                sh 'sleep 30' // Wait for services to start
                sh 'curl -f http://localhost:8080 || exit 1'
            }
        }
        
        stage('Deploy') {
            steps {
                echo "Deploy stage is running"
                sh 'docker-compose down'
                sh 'docker-compose up -d'
            }
        }
    }
    
    post {
        always {
            echo "Pipeline execution completed"
            sh 'docker-compose down'
        }
    }
}