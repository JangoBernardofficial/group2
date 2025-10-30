pipeline {
    agent any
    
    tools {
        git 'Default'
    }
    
    stages {
        stage('Clone Repository') {
            steps {
                echo "Clone stage is running"
                checkout scm
            }
        }
        
        stage('Build') {
            steps {
                echo "Build stage is running"
                script {
                    sh '''
                        echo "Building Docker images..."
                        docker-compose build
                        echo "Build completed successfully"
                    '''
                }
            }
        }
        
        stage('Test') {
            steps {
                echo "Test stage is running"
                script {
                    sh '''
                        echo "Starting services for testing..."
                        docker-compose up -d
                        sleep 30
                        echo "Testing web application..."
                        curl -f http://localhost:8080 && echo "Web app is running!" || exit 1
                        echo "Test stage completed"
                    '''
                }
            }
        }
        
        stage('Deploy') {
            steps {
                echo "Deploy stage is running"
                script {
                    sh '''
                        echo "Stopping existing services..."
                        docker-compose down
                        echo "Deploying new version..."
                        docker-compose up -d
                        echo "Deployment completed successfully"
                    '''
                }
            }
        }
    }
    
    post {
        always {
            echo "Pipeline execution completed"
            sh 'docker-compose down || true'
        }
        success {
            echo "✅ Pipeline completed successfully!"
            emailext (
                subject: "✅ BUILD SUCCESS: HEALTHRWANDA Module - ${env.JOB_NAME}",
                body: "The Jenkins build for HEALTHRWANDA completed successfully.\n\nBuild URL: ${env.BUILD_URL}",
                to: "bucyanny@gmail.com"
            )
        }
        failure {
            echo "❌ Pipeline failed!"
            emailext (
                subject: "❌ BUILD FAILED: HEALTHRWANDA Module - ${env.JOB_NAME}",
                body: "The Jenkins build for HEALTHRWANDA failed.\n\nPlease check: ${env.BUILD_URL}",
                to: "bucyanny@gmail.com"
            )
        }
    }
}